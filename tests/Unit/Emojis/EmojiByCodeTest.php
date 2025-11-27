<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Emojis;

test('success - from emoji', function (): void {
    $emoji = ':face_with_raised_eyebrow:';

    expect(new Emojis()->emojiByCode($emoji))->toBe('🤨');
});

test('fail - from empty string', function (): void {
    $emoji = '';

    expect(new Emojis()->emojiByCode($emoji))->toBe('');
});
