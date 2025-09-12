<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\FileJson;
use DenisKorbakov\EmojiPhp\Locale;
use DenisKorbakov\EmojiPhp\Parsers\EmojiListParser;

test('success - emoji list parse', function (): void {
    $locale = Locale::RU;

    $emojiLocale = new FileJson(
        new File(
            new EmojiFilePath($locale)->emojiLocale()
        )
    )->read();

    $parse = new EmojiListParser($emojiLocale)->parse();

    expect($parse)
        ->toBeArray()
        ->toHaveKey(0, "'😀'=>':grinning_face:'");
});
