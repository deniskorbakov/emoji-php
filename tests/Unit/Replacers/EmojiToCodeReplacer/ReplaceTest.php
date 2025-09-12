<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Replacers\EmojiToCodeReplacer;
use Tests\Fixtures\Files\TestFiles;

test('success - emoji to code with ru locale', function () {
    $textWithEmoji = new TestFiles()->emojiRuData();
    $textWithCode = new TestFiles()->codeRuData();

    expect(new EmojiToCodeReplacer($textWithEmoji)->replace())
        ->toBe($textWithCode);
});

test('success - simple text with ru locale', function () {
    $text = new TestFiles()->textRuData();

    expect(new EmojiToCodeReplacer($text)->replace())
        ->toBe($text);
});

test('success - emoji to code with en locale', function () {
    $textWithEmoji = new TestFiles()->emojiEnData();
    $textWithCode = new TestFiles()->codeEnData();

    expect(new EmojiToCodeReplacer($textWithEmoji)->replace())
        ->toBe($textWithCode);
});

test('success - simple text with en locale', function () {
    $text = new TestFiles()->textEnData();

    expect(new EmojiToCodeReplacer($text)->replace())
        ->toBe($text);
});

test('success - empty text', function () {
    $emptyText = new TestFiles()->emptyData();

    expect(new EmojiToCodeReplacer($emptyText)->replace())
        ->toBe($emptyText);
});
