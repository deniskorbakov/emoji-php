<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Searches\Keys;

interface KeySearch
{
    /** @return array<string, string|array<int, string>> */
    public function search(): array;
}
