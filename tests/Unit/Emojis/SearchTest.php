<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Emojis;
use DenisKorbakov\EmojiPhp\Locale;

test('success - search smile emoji', function () {
    $result = new Emojis(Locale::RU)->search('уф');

    expect($result)->toBeArray();
});
