<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp;

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\FileJson;
use DenisKorbakov\EmojiPhp\Replacers\CodeToEmojiReplacer;
use DenisKorbakov\EmojiPhp\Replacers\EmojiToCodeReplacer;
use DenisKorbakov\EmojiPhp\Searches\EmojiSearch;

final class Emojis
{
	public function __construct(
		public Locale $locale,
	) {
	}

	/**
	 * Replace code on emoji unicode from text
	 *
	 * @throws FileNotFoundException
	 */
	public function toEmoji(string $text): string
	{
		$emojiFile = new File(
			new EmojiFilePath($this->locale)->list()
		);

		return new CodeToEmojiReplacer($emojiFile, $text)->replace();
	}

	/**
	 * Replace emoji unicode on code from text
	 *
	 * @throws FileNotFoundException
	 */
	public function toCode(string $text): string
	{
		$emojiFile = new File(
			new EmojiFilePath($this->locale)->list()
		);

		return new EmojiToCodeReplacer($emojiFile, $text)->replace();
	}

	/**
	 * Get list emojis unicode with code group by category
	 *
	 * @return array<string, string>
	 * @throws FileNotFoundException
	 */
	public function list(): array
	{
		/** @var array<string, string> */
		return new File(
			new EmojiFilePath($this->locale)->list()
		)->execute();
	}

	/**
	 * Search for emojis by tags based on locale
	 *
	 * Search works only from 2 characters
	 *
	 * @param string $text
	 * @return array
	 * @throws FileNotFoundException
	 */
	public function search(string $text): array
	{
		$emojiLocaleFile = new FileJson(
			new File(
				new EmojiFilePath($this->locale)->emojiLocale()
			)
		);

		return new EmojiSearch($emojiLocaleFile, $text)->search();
	}
}
