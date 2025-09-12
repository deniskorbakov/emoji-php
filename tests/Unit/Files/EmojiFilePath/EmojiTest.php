<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Locale;

test('emoji method returns correct path', function (): void {
    $path = new EmojiFilePath(Locale::EN);

    expect($path->emoji())->toBe('vendor/milesj/emojibase/packages/data/en/compact.raw.json');
});
