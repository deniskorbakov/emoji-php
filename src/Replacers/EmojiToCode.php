<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Replacers;

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Locale;

final class EmojiToCode implements Replacer
{
    public function __construct(
        public string $emoji,
    ) {
    }

    public function replace(): string
    {
        try {
            /** @var array<string, string> $emojis */
            $emojis = new File(
                new EmojiFilePath(Locale::EN)->list()
            )->execute();

            return $emojis[trim($this->emoji)] ?? '';
        } catch (FileNotFoundException) {
            return '';
        }
    }
}
