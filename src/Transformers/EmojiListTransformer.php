<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Transformers;

final readonly class EmojiListTransformer implements Transformer
{
    /** @param list<string> $emojisList */
    public function __construct(
        public array $emojisList
    ) {
    }

    public function transform(): string
    {
        return sprintf('<?php return [%s];', implode(',', $this->emojisList));
    }
}
