<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Parsers\Maps;

interface MapParser
{
    /** @return array<string, string> */
    public function parse(): array;
}
