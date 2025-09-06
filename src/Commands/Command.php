<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Commands;

interface Command
{
    public function execute(): void;
}
