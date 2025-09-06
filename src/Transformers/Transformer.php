<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Transformers;

interface Transformer
{
    public function transform(): string;
}
