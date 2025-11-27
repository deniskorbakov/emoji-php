<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Emojis;

test('success - from emoji', function (): void {
    $emoji = '🤨';

    expect(new Emojis()->codeByEmoji($emoji))->toBe(':face_with_raised_eyebrow:');
});

test('fail - from empty string', function (): void {
    $emoji = '';

    expect(new Emojis()->codeByEmoji($emoji))->toBe('');
});
