<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Emojis;
use DenisKorbakov\EmojiPhp\Locale;
use DenisKorbakov\EmojiPhp\Files\File;

test('success - code to emoji with ru locale', function () {
    $textWithCode = new File('tests/Unit/Fixtures/Texts/ru_code.txt')->read();
    $textWithEmoji = new File('tests/Unit/Fixtures/Texts/ru_emoji.txt')->read();

    $result = new Emojis(Locale::RU)->toEmoji($textWithCode);

    expect($result)->toBe($textWithEmoji);
});

test('success - code to emoji with en locale', function () {
    $textWithCode = new File('tests/Unit/Fixtures/Texts/en_code.txt')->read();
    $textWithEmoji = new File('tests/Unit/Fixtures/Texts/en_emoji.txt')->read();

    $result = new Emojis(Locale::RU)->toEmoji($textWithCode);

    expect($result)->toBe($textWithEmoji);
});

