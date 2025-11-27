<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Replacers;

use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Locale;

final class CodeToEmoji implements Replacer
{
    public function __construct(
        public string $code,
    ) {
    }

    /**
     * @throws FileNotFoundException
     */
    public function replace(): string
    {
        /** @var array<string, string> $emojis */
        $emojis = new File(
            new EmojiFilePath(Locale::EN)->list()
        )->execute();

        return array_keys($emojis, trim($this->code), true)[0] ?? '';
    }
}
