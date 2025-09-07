<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Replacers;

interface Replacer
{
    public function replace(): string;
}
