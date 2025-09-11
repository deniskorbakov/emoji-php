<?php

declare(strict_types=1);


use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Locale;

test('cldr method returns correct path', function () {
    $path = new EmojiFilePath(Locale::EN);

    expect($path->cldr())->toBe('vendor/milesj/emojibase/packages/data/en/shortcodes/cldr.raw.json');
});
