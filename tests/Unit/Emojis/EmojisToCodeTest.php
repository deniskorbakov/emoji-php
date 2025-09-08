<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Emojis;
use DenisKorbakov\EmojiPhp\Locale;
use DenisKorbakov\EmojiPhp\Files\File;

test('success - emoji to code with ru locale', function () {
    $textWithEmoji = new File('tests/Unit/Fixtures/Texts/ru_emoji.txt')->read();
    $textWithCode = new File('tests/Unit/Fixtures/Texts/ru_code.txt')->read();

    $result = new Emojis()->toCode($textWithEmoji);

    expect($result)->toBe($textWithCode);
});

test('success - emoji to code with en locale', function () {
    $textWithEmoji = new File('tests/Unit/Fixtures/Texts/en_emoji.txt')->read();
    $textWithCode = new File('tests/Unit/Fixtures/Texts/en_code.txt')->read();

    $result = new Emojis()->toCode($textWithEmoji);

    expect($result)->toBe($textWithCode);
});
