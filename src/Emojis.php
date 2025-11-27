<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp;

use DenisKorbakov\EmojiPhp\Collections\EmojiCollection;
use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Replacers\CodeToEmoji;
use DenisKorbakov\EmojiPhp\Replacers\EmojiToCode;
use DenisKorbakov\EmojiPhp\Replacers\TextToCode;
use DenisKorbakov\EmojiPhp\Replacers\TextToEmoji;
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
        return new TextToEmoji($text)->replace();
    }

    /**
     * Replace emoji unicode on code from text
     *
     * @throws FileNotFoundException
     */
    public function toCode(string $text): string
    {
        return new TextToCode($text)->replace();
    }

    /**
     * Get list emojis unicode with code group by category
     *
     * @return array<string, array<string, string>>
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
     * @return array<string, string>
     * @throws FileNotFoundException
     */
    public function search(Locale $locale, string $text): array
    {
        return new EmojiSearch($locale, $text)->search();
    }

    /** Replace emoji unicode on code from emoji */
    public function codeByEmoji(string $emoji): string
    {
        return new EmojiToCode($emoji)->replace();
    }

    /** Replace code on emoji unicode from code */
    public function emojiByCode(string $code): string
    {
        return new CodeToEmoji($code)->replace();
    }
}
