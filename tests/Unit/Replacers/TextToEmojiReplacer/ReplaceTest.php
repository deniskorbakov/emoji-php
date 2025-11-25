<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Replacers\TextToEmoji;
use Tests\Fixtures\Files\TestFiles;

test('success - code to emoji with ru locale', function (): void {
    $textWithEmoji = new TestFiles()->emojiRuData();
    $textWithCode = new TestFiles()->codeRuData();

    expect(new TextToEmoji($textWithCode)->replace())->toBe($textWithEmoji);
});

test('success - simple text with ru locale', function (): void {
    $text = new TestFiles()->textRuData();

    expect(new TextToEmoji($text)->replace())->toBe($text);
});

test('success - code to emoji with en locale', function (): void {
    $textWithEmoji = new TestFiles()->emojiEnData();
    $textWithCode = new TestFiles()->codeEnData();

    expect(new TextToEmoji($textWithCode)->replace())
        ->toBe($textWithEmoji);
});

test('success - simple text with en locale', function (): void {
    $text = new TestFiles()->textEnData();

    expect(new TextToEmoji($text)->replace())->toBe($text);
});

test('success - empty text', function (): void {
    $emptyText = new TestFiles()->emptyData();

    expect(new TextToEmoji($emptyText)->replace())->toBe($emptyText);
});
