<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Collections;

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\BaseFile;
use DenisKorbakov\EmojiPhp\Files\FileJson;
use DenisKorbakov\EmojiPhp\Locale;

final class EmojiCollection implements Collection
{
	public function __construct(
		public Locale $locale,
	) {
	}

	/**
	 * @throws FileNotFoundException
	 */
	public function collect(): array
	{
		$emojis = new FileJson(
			new BaseFile(
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
