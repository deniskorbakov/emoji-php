<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Files\EmojiFilePath;
use DenisKorbakov\EmojiPhp\Locale;

test('list method returns correct path', function () {
    $path = new EmojiFilePath(Locale::EN);

    expect($path->list())->toBe('emojis/list.php');
});
