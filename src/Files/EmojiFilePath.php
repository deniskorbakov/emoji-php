<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Files;

use DenisKorbakov\EmojiPhp\Locale;

final readonly class EmojiFilePath
{
	public const string EMOJIS_DATA_BASE_PATH = 'vendor/milesj/emojibase/packages/data/';

	public const string EMOJI_FILE_NAME = '/compact.raw.json';
	public const string CLDR_CODE_FILE_NAME = 'en/shortcodes/cldr.raw.json';

	public const string EMOJI_LOCALE_DIR = 'emojis/';
	public const string EMOJI_LOCALE_EXTENSION = '.json';

	public const string EMOJI_LIST_DIR = 'lists/';
	public const string EMOJI_LIST_EXTENSION = '.php';


	public function __construct(
		public Locale $locale,
	) {
	}

	public function emoji(): string
	{
		return self::EMOJIS_DATA_BASE_PATH . $this->locale->value . self::EMOJI_FILE_NAME;
	}

	public function cldr(): string
	{
		return self::EMOJIS_DATA_BASE_PATH . self::CLDR_CODE_FILE_NAME;
	}

	public function emojiLocale(): string
	{
		return self::EMOJI_LOCALE_DIR . $this->locale->value . self::EMOJI_LOCALE_EXTENSION;
	}

	public function list(): string
	{
		return self::EMOJI_LOCALE_DIR . self::EMOJI_LIST_DIR .
			$this->locale->value . self::EMOJI_LIST_EXTENSION;
	}
}
