<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Commands\Arguments;

interface Arguments
{
    /** @return array<string, mixed> */
    public function all(): array;

    public function show(mixed $key): mixed;
}
