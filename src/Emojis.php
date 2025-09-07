<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp;

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Replacers\CodeToEmojiReplacer;
use DenisKorbakov\EmojiPhp\Replacers\EmojiToCodeReplacer;

final class Emojis
{
    public function __construct(
        public Locale $locale,
    ) {
    }

    /**
     * @throws FileNotFoundException
     */
    public function toEmoji(string $text): string
    {
        $emojiFile = new File(
            new EmojiFilePath($this->locale)->list()
        );

        return new CodeToEmojiReplacer($emojiFile, $text)->replace();
    }

    /**
     * @throws FileNotFoundException
     */
    public function toCode(string $text): string
    {
        $emojiFile = new File(
            new EmojiFilePath($this->locale)->list()
        );

        return new EmojiToCodeReplacer($emojiFile, $text)->replace();
    }

    /**
     * @return array<string, string>
     * @throws FileNotFoundException
     */
    public function list(): array
    {
        /** @var array<string, string> */
        return new File(
            new EmojiFilePath($this->locale)->list()
        )->execute();
    }
}
