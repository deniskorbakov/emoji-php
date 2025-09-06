<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Files;

final readonly class EmojiFilePath
{
    public const string EMOJIS_DATA_BASE_PATH = 'vendor/milesj/emojibase/packages/data/';

    public const string EMOJI_FILE_NAME = '/compact.raw.json';
    public const string CLDR_CODE_FILE_NAME = 'en/shortcodes/cldr.raw.json';

    public const string EMOJI_LOCALE_DIR = 'emojis/';
    public const string EMOJI_LOCALE_EXTENSION = '.json';

    public function __construct(
        public string $locale,
    ) {
    }

    public function emoji(): string
    {
        return self::EMOJIS_DATA_BASE_PATH . $this->locale . self::EMOJI_FILE_NAME;
    }

    public function cldr(): string
    {
        return self::EMOJIS_DATA_BASE_PATH . self::CLDR_CODE_FILE_NAME;
    }

    public function emojiLocale(): string
    {
        return self::EMOJI_LOCALE_DIR . $this->locale . self::EMOJI_LOCALE_EXTENSION;
    }
}
