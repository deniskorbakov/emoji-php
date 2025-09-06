<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp;

final class Emoji
{
    public function __construct(
        public Locale $locale,
    ) {
    }

    public function encode(): string
    {
        return '';
    }

    public function decode(): string
    {
        return '';
    }

    public function list(): array
    {
        return [];
    }
}
