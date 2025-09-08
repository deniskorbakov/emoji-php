<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Lists;

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\FileJson;
use DenisKorbakov\EmojiPhp\Locale;

final class EmojiList
{
	public function __construct(
		public Locale $locale,
	) {
	}

	/**
	 * @throws FileNotFoundException
	 */
	public function list(): array
	{
		$emojis = new FileJson(
			new File(
				new EmojiFilePath($this->locale)->emojiLocale()
			)
		)->read();

		$emojisList = [];

		foreach ($emojis as $emoji) {
			$emojisList[$emoji['group']][$emoji['unicode']] = $emoji['code'];
		}

		return $emojisList;
	}
}
