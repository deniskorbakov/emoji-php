<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\FileJson;
use DenisKorbakov\EmojiPhp\Locale;
use DenisKorbakov\EmojiPhp\Parsers\Maps\EmojiListMapParser;

test('success - emoji list map parse', function () {
    $locale = Locale::RU;

    $emojiLocale = new FileJson(
        new File(
            new EmojiFilePath($locale)->emojiLocale()
        )
    )->read();

    expect(new EmojiListMapParser($emojiLocale)->parse())
        ->toBeArray()
        ->toHaveKeys(['😄', '😛', '🤬']);
});
