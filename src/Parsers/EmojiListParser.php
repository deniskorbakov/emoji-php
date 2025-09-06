<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Parsers;

use DenisKorbakov\EmojiPhp\Files\FileJson;

final class EmojiListParser implements Parser
{
    public function __construct(
        public FileJson $emojisLocale,
    ){
    }

    public function parse(): array
    {
        return [];
    }
}
