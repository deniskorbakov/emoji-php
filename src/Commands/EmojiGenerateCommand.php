<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Commands;

use DenisKorbakov\EmojiPhp\Commands\Arguments\Arguments;
use DenisKorbakov\EmojiPhp\Commands\Outputs\ConsoleOutput;
use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\FileJson;
use DenisKorbakov\EmojiPhp\Mappers\EmojiLocaleMapper;
use Throwable;

final readonly class EmojiGenerateCommand implements Command
{
	public const string SUCCESS_SAVE = 'is your locale emoji saved';

	public const int LOCALE_KEY = 1;

	public function __construct(
		public Arguments $arguments,
	) {
	}

	public function execute(): void
	{
		$locale = $this->arguments->show(self::LOCALE_KEY);

		try {
			$emojiFile = new File(
				new EmojiFilePath($locale)->emoji()
			);

			$cldrCodeFile = new File(
				new EmojiFilePath($locale)->cldr()
			);

			$emojiWithCldrCodes = new EmojiLocaleMapper(
				new FileJson($emojiFile),
				new FileJson($cldrCodeFile)
			)->mapCldr();

			new FileJson(
				new File(
					new EmojiFilePath($locale)->emojiLocale()
				)
			)->write($emojiWithCldrCodes);

			new ConsoleOutput(self::SUCCESS_SAVE)->success();
		} catch (Throwable $exception) {
			new ConsoleOutput($exception->getMessage())->error();
		}
	}
}
