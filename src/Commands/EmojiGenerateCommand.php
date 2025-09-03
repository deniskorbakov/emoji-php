<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Commands;

use DenisKorbakov\EmojiPhp\Commands\Arguments\ArgumentKey;
use DenisKorbakov\EmojiPhp\Commands\Arguments\Arguments;
use Throwable;

final readonly class EmojiGenerateCommand implements Command
{
    public function __construct(
        public Arguments $arguments,
    ) {
    }

    public function execute(): void
    {
        $locale = $this->arguments->show(
            ArgumentKey::LocaleKey
        );

        try {
            $emojiFilepath = "vendor/milesj/emojibase/packages/data/$locale/compact.raw.json";
            $cldrCodeFilePath = "vendor/milesj/emojibase/packages/data/en/shortcodes/cldr.raw.json";

            if (! file_exists($emojiFilepath)) {
                echo "Error: emoji with current locale is not exists\n";
                exit(1);
            }

            if (! file_exists($cldrCodeFilePath)) {
                echo "Error: short code with current locale is not exists\n";
                exit(1);
            }

            $emojiFileData = file_get_contents($emojiFilepath, true);
            $cldrFileData = file_get_contents($cldrCodeFilePath, true);

            $emojis = json_decode($emojiFileData, true);
            $cldrCodes = json_decode($cldrFileData, true);

            foreach ($emojis as &$emoji) {
                $hexCodeKey = $emoji['hexcode'];

                $emoji['code'] = $cldrCodes[$hexCodeKey] ?? null;

                unset($emoji['hexcode']);
            }
            unset($emoji);

            file_put_contents("emojis/{$locale}.json", json_encode($emojis, JSON_PRETTY_PRINT));
        } catch (Throwable $exception) {
            echo "Error: {$exception->getMessage()}\n";
            exit(1);
        }
    }
}
