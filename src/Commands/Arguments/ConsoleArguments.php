<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Commands\Arguments;

final class ConsoleArguments implements Arguments
{
    /** @param array<string, mixed> $arguments */
    public function __construct(
        public array $arguments,
    ) {
    }

    public function show(mixed $key): mixed
    {
        return $this->arguments[$key];
    }

    public function all(): array
    {
        return $this->arguments;
    }
}
