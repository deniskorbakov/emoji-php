<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Commands;

use DenisKorbakov\EmojiPhp\Commands\Arguments\Arguments;
use DenisKorbakov\EmojiPhp\Commands\Outputs\ConsoleOutput;
use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\FileJson;
use DenisKorbakov\EmojiPhp\Mappers\EmojiLocaleMapper;
use DenisKorbakov\EmojiPhp\Parsers\EmojiListParser;
use DenisKorbakov\EmojiPhp\Transformers\EmojiListTransformer;
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

		$emojisLocaleFile = new FileJson(
			new File(
				new EmojiFilePath($locale)->emoji()
			)
		);

		$cldrLocaleFile = new FileJson(
			new File(
				new EmojiFilePath($locale)->cldr()
			)
		);

		$emojisWithCldrFile = new FileJson(
			new File(
				new EmojiFilePath($locale)->emojiLocale()
			)
		);

		$emojisListFile = new File(
			new EmojiFilePath($locale)->list()
		);

		try {
			$emojisWithCldrFile->write(
				new EmojiLocaleMapper(
					$emojisLocaleFile,
					$cldrLocaleFile
				)->combine()
			);

			$emojisListFile->write(
				new EmojiListTransformer(
					new EmojiListParser($emojisWithCldrFile)->parse()
				)->transform()
			);

			new ConsoleOutput(self::SUCCESS_SAVE)->success();
		} catch (Throwable $exception) {
			new ConsoleOutput($exception->getMessage())->error();
		}
	}
}
