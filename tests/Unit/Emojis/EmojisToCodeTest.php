<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Emojis;
use Tests\Unit\Fixtures\Files\TestFiles;

test('success - emoji to code with ru locale', function () {
    $textWithEmoji = new TestFiles()->emojiRuData();
    $textWithCode = new TestFiles()->codeRuData();

    $result = new Emojis()->toCode($textWithEmoji);

    expect($result)->toBe($textWithCode);
});

test('success - emoji to code with en locale', function () {
    $textWithEmoji = new TestFiles()->emojiEnData();
    $textWithCode = new TestFiles()->codeEnData();

    $result = new Emojis()->toCode($textWithEmoji);

    expect($result)->toBe($textWithCode);
});
