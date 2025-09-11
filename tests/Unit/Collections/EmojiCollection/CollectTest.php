<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Collections\EmojiCollection;
use DenisKorbakov\EmojiPhp\Locale;

test('success - collect emojis for ru locale', function () {
    $result = new EmojiCollection(Locale::RU)->collect();

    expect($result)->toBeArray();
});

test('success - collect emojis for en locale', function () {
    $result = new EmojiCollection(Locale::EN)->collect();

    expect($result)->toBeArray();
});
