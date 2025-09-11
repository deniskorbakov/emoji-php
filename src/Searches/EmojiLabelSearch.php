<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Searches;

final class EmojiLabelSearch implements Search
{
    public function __construct(
        public array $emoji,
        public string $searchText,
    ) {
    }

    public function search(): array
    {
        if (! array_key_exists('label', $this->emoji)) {
            return [];
        }

        $label = $this->emoji['label'];

        if (! isset($label)) {
            return [];
        }

        if (false === stripos($label, $this->searchText)) {
            return [];
        }

        return $this->emoji;
    }
}
