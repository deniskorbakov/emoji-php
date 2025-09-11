<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Locale;

test('emojiLocale method returns correct path', function () {
    $path = new EmojiFilePath(Locale::RU);

    expect($path->emojiLocale())->toBe('emojis/locale/ru.json');
});
