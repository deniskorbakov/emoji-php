<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Files;

use DenisKorbakov\EmojiPhp\Locale;

final readonly class EmojiFilePath
{
    public const string EMOJIS_DATA_BASE_PATH = 'vendor/milesj/emojibase/packages/data/';

    public const string EMOJI_FILENAME = '/compact.raw.json';
    public const string EMOJI_GROUPS_FILENAME = '/messages.raw.json';
    public const string CLDR_CODE_FILENAME = 'en/shortcodes/cldr.raw.json';

    public const string EMOJI_LOCALE_DIR = '/../../emojis/locale/';
    public const string EMOJI_LOCALE_EXTENSION = '.json';

    public const string EMOJI_LIST_FILENAME = '/../../emojis/list.php';


    public function __construct(
        public Locale $locale,
    ) {
    }

    public function emoji(): string
    {
        return self::EMOJIS_DATA_BASE_PATH . $this->locale->value . self::EMOJI_FILENAME;
    }

    public function cldr(): string
    {
        return self::EMOJIS_DATA_BASE_PATH . self::CLDR_CODE_FILENAME;
    }

    public function emojiLocale(): string
    {
        return __DIR__ .  self::EMOJI_LOCALE_DIR . $this->locale->value . self::EMOJI_LOCALE_EXTENSION;
    }

    public function list(): string
    {
        return __DIR__ . self::EMOJI_LIST_FILENAME;
    }

    public function groups(): string
    {
        return self::EMOJIS_DATA_BASE_PATH . $this->locale->value . self::EMOJI_GROUPS_FILENAME;
    }
}
