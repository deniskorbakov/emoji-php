<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Collections;

interface Collection
{
    /** @return array<string, array<string, string>> */
    public function collect(): array;
}
