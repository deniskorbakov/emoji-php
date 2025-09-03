<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Commands;

use DenisKorbakov\EmojiPhp\Commands\Arguments\ArgumentKey;
use DenisKorbakov\EmojiPhp\Commands\Arguments\Arguments;

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

        echo $locale;
    }
}
