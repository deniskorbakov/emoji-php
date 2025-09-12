<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Replacers\CodeToEmojiReplacer;
use Tests\Fixtures\Files\TestFiles;

test('success - code to emoji with ru locale', function (): void {
    $textWithEmoji = new TestFiles()->emojiRuData();
    $textWithCode = new TestFiles()->codeRuData();

    expect(new CodeToEmojiReplacer($textWithCode)->replace())->toBe($textWithEmoji);
});

test('success - simple text with ru locale', function (): void {
    $text = new TestFiles()->textRuData();

    expect(new CodeToEmojiReplacer($text)->replace())->toBe($text);
});

test('success - code to emoji with en locale', function (): void {
    $textWithEmoji = new TestFiles()->emojiEnData();
    $textWithCode = new TestFiles()->codeEnData();

    expect(new CodeToEmojiReplacer($textWithCode)->replace())
        ->toBe($textWithEmoji);
});

test('success - simple text with en locale', function (): void {
    $text = new TestFiles()->textEnData();

    expect(new CodeToEmojiReplacer($text)->replace())->toBe($text);
});

test('success - empty text', function (): void {
    $emptyText = new TestFiles()->emptyData();

    expect(new CodeToEmojiReplacer($emptyText)->replace())->toBe($emptyText);
});
