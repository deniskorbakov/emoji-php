<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Commands;

use DenisKorbakov\EmojiPhp\Commands\Arguments\Arguments;
use DenisKorbakov\EmojiPhp\Commands\Outputs\ConsoleOutput;
use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\FileJson;
use DenisKorbakov\EmojiPhp\Locale;
use DenisKorbakov\EmojiPhp\Mappers\EmojiLocaleMap;
use DenisKorbakov\EmojiPhp\Parsers\EmojiListParser;
use DenisKorbakov\EmojiPhp\Transformers\EmojiListTransformer;
use Throwable;

final readonly class EmojiGenerateCommand implements Command
{
    public const string SUCCESS_SAVE = 'is your locale emoji saved';

    public const string ERROR_LOCALE = 'locale is not found';

    public const int LOCALE_KEY = 1;

    public function __construct(
        public Arguments $arguments,
    ) {
    }

    public function execute(): void
    {
        try {
            $localeArg = $this->arguments->show(self::LOCALE_KEY);
            $locale = Locale::tryFrom($localeArg);

            if (null === $locale) {
                new ConsoleOutput(self::ERROR_LOCALE)->error();
                return;
            }

            $emojiBaseLocaleFile = new File(
                new EmojiFilePath($locale)->emoji()
            );

            $emojiBaseCldrFile = new File(
                new EmojiFilePath($locale)->cldr()
            );

            $emojiListFile = new File(
                new EmojiFilePath($locale)->emojiLocale()
            );

            $groupsFile = new File(
                new EmojiFilePath($locale)->groups()
            );

            $emojisCldrCombined = new EmojiLocaleMap(
                new FileJson($emojiBaseLocaleFile),
                new FileJson($emojiBaseCldrFile),
                new FileJson($groupsFile)
            )->combine();

            $emojiLocaleFile = new FileJson($emojiListFile);
            $emojiLocaleFile->write($emojisCldrCombined);

            $emojiListFile = new File(
                new EmojiFilePath($locale)->list()
            );

            $emojiListFile->write(
                new EmojiListTransformer(
                    new EmojiListParser($emojisCldrCombined)->parse()
                )->transform()
            );

            new ConsoleOutput(self::SUCCESS_SAVE)->success();
        } catch (Throwable $exception) {
            new ConsoleOutput($exception->getMessage())->error();
        }
    }
}
