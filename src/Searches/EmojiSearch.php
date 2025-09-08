<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Searches;

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\FileJson;
use DenisKorbakov\EmojiPhp\Locale;
use DenisKorbakov\EmojiPhp\Parsers\EmojiListParser;

final class EmojiSearch implements Search
{
	public const int MIN_COUNT_CHARS = 2;

	public function __construct(
		public Locale $locale,
		public string $text,
	) {
	}

	/**
	 * @throws FileNotFoundException
	 */
	public function search(): array
	{
		$emojis = new FileJson(
			new File(
				new EmojiFilePath($this->locale)->emojiLocale()
			),
		)->read();

		$searchText = trim($this->text);

		if (empty($searchText) || mb_strlen($searchText) < self::MIN_COUNT_CHARS) {
			return [];
		}

		$searchedEmojis = [];

		foreach ($emojis as $emoji) {
			$emojiByLabel = $this->searchByLabel($emoji, $searchText);

			if (!empty($emojiByLabel)) {
				$searchedEmojis[] = $emojiByLabel;
				continue;
			}

			$emojiByTags = $this->searchByTags($emoji, $searchText);

			if (!empty($emojiByTags)) {
				$searchedEmojis[] = $emojiByTags;
			}
		}

		return new EmojiListParser(
			$searchedEmojis,
		)->parse();
	}

	public function searchByLabel(array $emoji, string $searchText): array
	{
		if (!array_key_exists('label', $emoji)) {
			return [];
		}

		$label = $emoji['label'];

		if (!isset($label)) {
			return [];
		}

		if (false === stripos($label, $searchText)) {
			return [];
		}

		return $emoji;
	}

	public function searchByTags(array $emoji, string $searchText): array
	{
		if (!array_key_exists('tags', $emoji)) {
			return [];
		}

		$tags = $emoji['tags'];

		if (!isset($tags) || !is_array($tags)) {
			return [];
		}

		if (array_any($tags, fn($tag) => false !== stripos($tag, $searchText))) {
			return $emoji;
		}

		return [];
	}
}
