<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Replacers;

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Locale;

final readonly class CodeToEmojiReplacer implements Replacer
{
    public function __construct(
        public string $text,
    ) {
    }

    /**
     * @throws FileNotFoundException
     */
    public function replace(): string
    {
        $emojis = new File(
            new EmojiFilePath(Locale::EN)->list()
        )->execute();

        return str_replace(
            array_values($emojis),
            array_keys($emojis),
            $this->text
        );
    }
}
