<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Parsers;

interface Parser
{
    public function parse(): array;
}
