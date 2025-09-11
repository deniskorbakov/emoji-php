<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Commands\Outputs;

interface Output
{
    public function error(): void;

    public function success(): void;
}
