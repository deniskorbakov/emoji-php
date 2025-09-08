<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Lists;

use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\FileJson;

final class EmojiList
{
    public function __construct(
        public File $emojiLocaleFile,
    ) {
    }

    /**
     * @throws FileNotFoundException
     */
    public function list(): array
    {
        $emojis = new FileJson($this->emojiLocaleFile)->read();

        $emojisList = [];

        foreach ($emojis as $emoji) {
            $emojisList[$emoji['group']][$emoji['unicode']] = $emoji['code'];
        }

        return $emojisList;
    }
}
