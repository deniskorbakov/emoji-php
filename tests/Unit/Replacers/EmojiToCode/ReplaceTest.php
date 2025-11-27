<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Replacers\EmojiToCode;

test('success - from emoji', function (): void {
    $emoji = '🤨';

    expect(new EmojiToCode($emoji)->replace())->toBe(':face_with_raised_eyebrow:');
});

test('success - from emoji with space', function (): void {
    $emoji = ' 😶 ';

    expect(new EmojiToCode($emoji)->replace())->toBe(':face_without_mouth:');
});

test('fail - from empty string', function (): void {
    $emoji = '';

    expect(new EmojiToCode($emoji)->replace())->toBe('');
});

test('fail - from empty string with space', function (): void {
    $emoji = '  ';

    expect(new EmojiToCode($emoji)->replace())->toBe('');
});

test('fail - from code', function (): void {
    $emoji = ':face_without_mouth:';

    expect(new EmojiToCode($emoji)->replace())->toBe('');
});

test('fail - more emojis', function (): void {
    $emoji = '🤨😶';

    expect(new EmojiToCode($emoji)->replace())->toBe('');
});

test('fail - random string', function (): void {
    $emoji = 'random string';

    expect(new EmojiToCode($emoji)->replace())->toBe('');
});

test('fail - text with emoji', function (): void {
    $emoji = '🤨 this is text 😶';

    expect(new EmojiToCode($emoji)->replace())->toBe('');
});
