<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Replacers;

use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\File;

final readonly class EmojiToCodeReplacer implements Replacer
{
    public function __construct(
        public File $emojiFile,
        public string $text,
    ) {
    }

    /**
     * @throws FileNotFoundException
     */
    public function replace(): string
    {
        $emojis = $this->emojiFile->execute();

        return str_replace(
            array_keys($emojis),
            array_values($emojis),
            $this->text
        );
    }
}
