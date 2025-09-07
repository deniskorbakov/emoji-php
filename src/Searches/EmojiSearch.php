<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Searches;

use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\FileJson;
use DenisKorbakov\EmojiPhp\Parsers\EmojiListParser;

final class EmojiSearch implements Search
{
    public const int MIN_COUNT_CHARS = 2;

    public function __construct(
        public FileJson $emojiLocaleFile,
        public string $text,
    ) {
    }

    /**
     * @throws FileNotFoundException
     */
    public function search(): array
    {
        $emojis = $this->emojiLocaleFile->read();
        $searchText = trim($this->text);

        if (empty($searchText) || mb_strlen($searchText) < self::MIN_COUNT_CHARS) {
            return [];
        }

        $results = [];

        foreach ($emojis as $emoji) {
            if (! array_key_exists('label', $emoji)) {
                continue;
            }

            $label = $emoji['label'];

            if (! isset($label)) {
                continue;
            }

            if (false !== stripos($label, $searchText)) {
                $results[] = $emoji;
                continue;
            }

            if (! array_key_exists('tags', $emoji)) {
                continue;
            }

            $tags = $emoji['tags'];

            if (! isset($tags) || ! is_array($tags)) {
                continue;
            }

            foreach ($tags as $tag) {
                if (false !== stripos($tag, $searchText)) {
                    $results[] = $emoji;
                    break;
                }
            }
        }

        return new EmojiListParser(
            $results,
        )->parse();
    }
}
