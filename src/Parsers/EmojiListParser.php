<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Parsers;

use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\FileJson;

final class EmojiListParser implements Parser
{
	public const string SEPARATOR = ':';

	public function __construct(
		public FileJson $emojisLocale,
	) {
	}

	/**
	 * @return array<string, string>
	 * @throws FileNotFoundException
	 */
	public function parse(): array
	{
		$emojisList = [];

		$emojis = $this->emojisLocale->read();

		foreach ($emojis as $emoji) {
			$emojiUnicode = $emoji['unicode'];
			$cldrCode = self::SEPARATOR . $emoji['code'] . self::SEPARATOR;

			$emojisList[] = sprintf("'%s'=>'%s'", $emojiUnicode, $cldrCode);
		}

		return $emojisList;
	}
}
