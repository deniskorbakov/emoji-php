<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Emojis;
use Tests\Unit\Fixtures\Files\TextFiles;

test('success - emoji to code with ru locale', function () {
    $textWithEmoji = new TextFiles()->emojiRuData();
    $textWithCode = new TextFiles()->codeRuData();

    $result = new Emojis()->toCode($textWithEmoji);

    expect($result)->toBe($textWithCode);
});

test('success - emoji to code with en locale', function () {
    $textWithEmoji = new TextFiles()->emojiEnData();
    $textWithCode = new TextFiles()->codeEnData();

    $result = new Emojis()->toCode($textWithEmoji);

    expect($result)->toBe($textWithCode);
});
