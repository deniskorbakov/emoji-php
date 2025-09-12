<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Emojis;
use Tests\Fixtures\Files\TestFiles;

test('success - emoji to code with ru locale', function (): void {
    $textWithEmoji = new TestFiles()->emojiRuData();
    $textWithCode = new TestFiles()->codeRuData();

    $result = new Emojis()->toCode($textWithEmoji);

    expect($result)->toBe($textWithCode);
});

test('success - simple text with ru locale', function (): void {
    $text = new TestFiles()->textRuData();

    expect(new Emojis()->toCode($text))->toBe($text);
});

test('success - emoji to code with en locale', function (): void {
    $textWithEmoji = new TestFiles()->emojiEnData();
    $textWithCode = new TestFiles()->codeEnData();

    $result = new Emojis()->toCode($textWithEmoji);

    expect($result)->toBe($textWithCode);
});

test('success - simple text with en locale', function (): void {
    $text = new TestFiles()->textEnData();

    expect(new Emojis()->toCode($text))->toBe($text);
});

test('success - empty text', function (): void {
    $emptyText = new TestFiles()->emptyData();

    expect(new Emojis()->toCode($emptyText))->toBe($emptyText);
});
