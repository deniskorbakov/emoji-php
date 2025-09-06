<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Parsers;

final class EmojiListParser implements Parser
{
	public const string SEPARATOR = ':';

	/** @param array<int, array<string, mixed>> $emojisLocale */
	public function __construct(
		public array $emojisLocale,
	) {
	}

	/** @return array<string, string> */
	public function parse(): array
	{
		$emojisList = [];

		foreach ($this->emojisLocale as $emoji) {
			$emojiUnicode = $emoji['unicode'];
			$cldrCode = self::SEPARATOR . $emoji['code'] . self::SEPARATOR;

			$emojisList[] = sprintf("'%s'=>'%s'", $emojiUnicode, $cldrCode);
		}

		return $emojisList;
	}
}
