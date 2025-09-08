<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp;

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Lists\EmojiList;
use DenisKorbakov\EmojiPhp\Replacers\CodeToEmojiReplacer;
use DenisKorbakov\EmojiPhp\Replacers\EmojiToCodeReplacer;
use DenisKorbakov\EmojiPhp\Searches\EmojiSearch;

final class Emojis
{
    public function __construct(
        public Locale $locale,
    ) {
    }

    /**
     * Replace code on emoji unicode from text
     *
     * @throws FileNotFoundException
     */
    public function toEmoji(string $text): string
    {
        return new CodeToEmojiReplacer(
            new File(
                new EmojiFilePath($this->locale)->list()
            ), $text
        )->replace();
    }

    /**
     * Replace emoji unicode on code from text
     *
     * @throws FileNotFoundException
     */
    public function toCode(string $text): string
    {
        return new EmojiToCodeReplacer(
            new File(
                new EmojiFilePath($this->locale)->list()
            ), $text
        )->replace();
    }

    /**
     * Get list emojis unicode with code group by category
     *
     * @return array<string, string>
     * @throws FileNotFoundException
     */
    public function list(): array
    {
        return new EmojiList(
            new File(
                new EmojiFilePath($this->locale)->emojiLocale()
            )
        )->list();
    }

    /**
     * Search for emojis by tags based on locale
     *
     * Search works only from 2 characters
     *
     * @param string $text
     * @return array
     * @throws FileNotFoundException
     */
    public function search(string $text): array
    {
        return new EmojiSearch(
            new File(
                new EmojiFilePath($this->locale)->emojiLocale()
            ), $text
        )->search();
    }
}
