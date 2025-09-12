<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Collections;

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\FileJson;
use DenisKorbakov\EmojiPhp\Locale;

final class EmojiCollection implements Collection
{
    public function __construct(
        public Locale $locale,
    ) {
    }

    /**
     * @return array<string, array<string, string>>
     * @throws FileNotFoundException
     */
    public function collect(): array
    {
        /** @var array<string, array<string, string>> $emojis */
        $emojis = new FileJson(
            new File(
                new EmojiFilePath($this->locale)->emojiLocale()
            )
        )->read();

        $emojisList = [];

        foreach ($emojis as $emoji) {
            if (
                ! array_key_exists('group', $emoji) &&
                ! array_key_exists('unicode', $emoji) &&
                ! array_key_exists('code', $emoji)
            ) {
                continue;
            }

            $emojisList[$emoji['group']][$emoji['unicode']] = $emoji['code'];
        }

        return $emojisList;
    }
}
