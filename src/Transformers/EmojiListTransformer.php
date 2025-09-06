<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Transformers;

final class EmojiListTransformer implements Transformer
{
    public function __construct(
        public array $emojisList,
    ){
    }

    public function transform(): string
    {
        //todo трансформировать массив в строку для вывода из файла
        return '';
    }
}
