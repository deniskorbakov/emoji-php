<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Parsers\Maps;

final readonly class EmojiListMapParser implements MapParser
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
            /** @var string $emojiUnicode */
            $emojiUnicode = $emoji['unicode'];

            if (! is_string($emoji['code'])) {
                continue;
            }

            $cldrCode = self::SEPARATOR . $emoji['code'] . self::SEPARATOR;

            $emojisList[$emojiUnicode] = $cldrCode;
        }

        return $emojisList;
    }
}
