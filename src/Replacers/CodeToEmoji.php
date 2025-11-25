<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Replacers;

class CodeToEmoji implements Replacer
{
    public function __construct(
        public string $code,
    ) {
    }

    public function replace(): string
    {
        return '';
    }
}
