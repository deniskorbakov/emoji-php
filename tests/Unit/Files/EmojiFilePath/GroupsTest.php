<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Locale;

test('groups method returns correct path', function () {
    $path = new EmojiFilePath(Locale::EN);

    expect($path->groups())->toBe('vendor/milesj/emojibase/packages/data/en/messages.raw.json');
});
