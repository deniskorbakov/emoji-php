<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Replacers;

class EmojiToCode implements Replacer
{
    public function __construct(
        public string $emoji,
    ) {
    }

    public function replace(): string
    {
        return '';
    }
}
