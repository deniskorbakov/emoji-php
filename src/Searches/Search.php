<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Searches;

interface Search
{
    public function search(): array;
}
