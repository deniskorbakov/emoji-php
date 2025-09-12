<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Mappers;

interface Map
{
    /** @return array<int, array<string, mixed>> */
    public function combine(): array;
}
