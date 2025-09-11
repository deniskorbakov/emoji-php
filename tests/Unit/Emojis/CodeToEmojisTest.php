<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Emojis;
use Tests\Unit\Fixtures\Files\TextFiles;

test('success - code to emoji with ru locale', function () {
    $textWithEmoji = new TextFiles()->emojiRuData();
    $textWithCode = new TextFiles()->codeRuData();

    $result = new Emojis()->toEmoji($textWithCode);

    expect($result)->toBe($textWithEmoji);
});

test('success - code to emoji with en locale', function () {
    $textWithEmoji = new TextFiles()->emojiEnData();
    $textWithCode = new TextFiles()->codeEnData();

    $result = new Emojis()->toEmoji($textWithCode);

    expect($result)->toBe($textWithEmoji);
});

