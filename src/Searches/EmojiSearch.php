<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Searches;

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\FileJson;
use DenisKorbakov\EmojiPhp\Locale;
use DenisKorbakov\EmojiPhp\Parsers\Maps\EmojiListMapParser;
use DenisKorbakov\EmojiPhp\Searches\Keys\EmojiLabelKeySearch;
use DenisKorbakov\EmojiPhp\Searches\Keys\EmojiTagsKeySearch;

final class EmojiSearch implements Search
{
    public const int MIN_COUNT_CHARS = 2;

    public function __construct(
        public Locale $locale,
        public string $text,
    ) {
    }

    /**
     * @return array<string, string>
     * @throws FileNotFoundException
     */
    public function search(): array
    {
        /** @var array<int, array<string, string|array<int, string>>> $emojis */
        $emojis = new FileJson(
            new File(
                new EmojiFilePath($this->locale)->emojiLocale()
            ),
        )->read();

        $searchText = trim($this->text);

        if (empty($searchText) || mb_strlen($searchText) < self::MIN_COUNT_CHARS) {
            return [];
        }

        $searchedEmojis = [];

        foreach ($emojis as $emoji) {
            $emojiByLabel = new EmojiLabelKeySearch($emoji, $searchText)->search();
            if (! empty($emojiByLabel)) {
                $searchedEmojis[] = $emojiByLabel;
                continue;
            }

            $emojiByTags = new EmojiTagsKeySearch($emoji, $searchText)->search();
            if (! empty($emojiByTags)) {
                $searchedEmojis[] = $emojiByTags;
            }
        }

        return new EmojiListMapParser(
            $searchedEmojis,
        )->parse();
    }
}
