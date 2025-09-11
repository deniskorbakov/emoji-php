<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp;

use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Collections\EmojiCollection;
use DenisKorbakov\EmojiPhp\Replacers\CodeToEmojiReplacer;
use DenisKorbakov\EmojiPhp\Replacers\EmojiToCodeReplacer;
use DenisKorbakov\EmojiPhp\Searches\EmojiSearch;

final class Emojis
{
    /**
     * Replace code on emoji unicode from text
     *
     * @throws FileNotFoundException
     */
    public function toEmoji(string $text): string
    {
        return new CodeToEmojiReplacer($text)->replace();
    }

    /**
     * Replace emoji unicode on code from text
     *
     * @throws FileNotFoundException
     */
    public function toCode(string $text): string
    {
        return new EmojiToCodeReplacer($text)->replace();
    }

    /**
     * Get list emojis unicode with code group by category
     *
     * @return array<string, string>
     * @throws FileNotFoundException
     */
    public function list(Locale $locale): array
    {
        return new EmojiCollection($locale)->collect();
    }

    /**
     * Search for emojis by tags based on locale
     *
     * Search works only from 2 characters
     *
     * @param Locale $locale
     * @param string $text
     * @return array
     * @throws FileNotFoundException
     */
    public function search(Locale $locale, string $text): array
    {
        return new EmojiSearch($locale, $text)->search();
    }
}
