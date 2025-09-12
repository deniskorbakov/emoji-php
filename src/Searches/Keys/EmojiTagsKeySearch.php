<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Searches\Keys;

use DenisKorbakov\EmojiPhp\Searches\Search;

final class EmojiTagsKeySearch implements Search
{
    /** @param array<string, string|array<int, string>> $emoji */
    public function __construct(
        public array $emoji,
        public string $searchText,
    ) {
    }

    /** @return array<string, string|array<int, string>> */
    public function search(): array
    {
        if (! array_key_exists('tags', $this->emoji)) {
            return [];
        }

        /** @var array<int, string> $tags */
        $tags = $this->emoji['tags'];

        if (empty($tags)) {
            return [];
        }

        if (array_any($tags, fn($tag): bool => false !== stripos($tag, $this->searchText))) {
            return $this->emoji;
        }

        return [];
    }
}
