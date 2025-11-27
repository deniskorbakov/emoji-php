<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Replacers\CodeToEmoji;

test('success - from code', function (): void {
    $code = ':face_with_raised_eyebrow:';

    expect(new CodeToEmoji($code)->replace())->toBe('🤨');
});

test('success - from code with space', function (): void {
    $code = ' :face_without_mouth: ';

    expect(new CodeToEmoji($code)->replace())->toBe('😶');
});

test('fail - from empty string', function (): void {
    $code = '';

    expect(new CodeToEmoji($code)->replace())->toBe('');
});

test('fail - from empty string with space', function (): void {
    $code = '  ';

    expect(new CodeToEmoji($code)->replace())->toBe('');
});

test('fail - from emoji', function (): void {
    $code = '😶';

    expect(new CodeToEmoji($code)->replace())->toBe('');
});

test('fail - more code', function (): void {
    $code = ':face_without_mouth: :face_without_mouth:';

    expect(new CodeToEmoji($code)->replace())->toBe('');
});

test('fail - random string', function (): void {
    $code = 'random string';

    expect(new CodeToEmoji($code)->replace())->toBe('');
});

test('fail - text with emoji', function (): void {
    $code = '🤨 this is text 😶';

    expect(new CodeToEmoji($code)->replace())->toBe('');
});

test('fail - from broke code', function (): void {
    $code = ':face_';

    expect(new CodeToEmoji($code)->replace())->toBe('');
});
