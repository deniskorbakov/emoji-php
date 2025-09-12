<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\FileJson;
use DenisKorbakov\EmojiPhp\Mappers\EmojiLocaleMap;
use DenisKorbakov\EmojiPhp\Locale;

test('success - emoji locale map combine', function (): void {
    $locale = Locale::RU;

    $emojisCldrCombined = new EmojiLocaleMap(
        new FileJson(
            new File(
                new EmojiFilePath($locale)->emoji()
            )
        ),
        new FileJson(
            new File(
                new EmojiFilePath($locale)->cldr()
            )
        ),
        new FileJson(
            new File(
                new EmojiFilePath($locale)->groups()
            )
        )
    )->combine();

    expect($emojisCldrCombined)->toBeArray();
});
