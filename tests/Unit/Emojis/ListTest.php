<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Emojis;
use DenisKorbakov\EmojiPhp\Locale;

test('success - get list emojis', function () {
    $result = new Emojis(Locale::RU)->list();

    expect($result)->toBeArray();
});
