<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Parsers;

interface Parser
{
    /** @return list<string> */
    public function parse(): array;
}
