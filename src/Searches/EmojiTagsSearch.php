<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Searches;

final class EmojiTagsSearch implements Search
{
    public function __construct(
        public array $emoji,
        public string $searchText,
    ) {
    }


    public function search(): array
    {
        if (! array_key_exists('tags', $this->emoji)) {
            return [];
        }

        $tags = $this->emoji['tags'];

        if (! isset($tags) || ! is_array($tags)) {
            return [];
        }

        if (array_any($tags, fn($tag) => false !== stripos($tag, $this->searchText))) {
            return $this->emoji;
        }

        return [];
    }
}
