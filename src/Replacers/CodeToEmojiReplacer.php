<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Replacers;

use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\File;

final readonly class CodeToEmojiReplacer implements Replacer
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
            array_values($emojis),
            array_keys($emojis),
            $this->text
        );
    }
}
