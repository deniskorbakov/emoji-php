<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Searches;

interface Search
{
    /** @return array<string, string> */
    public function search(): array;
}
