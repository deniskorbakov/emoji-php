<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Searches\Keys;

final class EmojiLabelKeySearch implements KeySearch
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
        if (! array_key_exists('label', $this->emoji)) {
            return [];
        }

        /** @var string $label */
        $label = $this->emoji['label'];

        if (empty($label)) {
            return [];
        }

        if (false === stripos($label, $this->searchText)) {
            return [];
        }

        return $this->emoji;
    }
}
