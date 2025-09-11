<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Emojis;
use Tests\Unit\Fixtures\Files\TestFiles;

test('success - code to emoji with ru locale', function () {
    $textWithEmoji = new TestFiles()->emojiRuData();
    $textWithCode = new TestFiles()->codeRuData();

    $result = new Emojis()->toEmoji($textWithCode);

    expect($result)->toBe($textWithEmoji);
});

test('success - code to emoji with en locale', function () {
    $textWithEmoji = new TestFiles()->emojiEnData();
    $textWithCode = new TestFiles()->codeEnData();

    $result = new Emojis()->toEmoji($textWithCode);

    expect($result)->toBe($textWithEmoji);
});

