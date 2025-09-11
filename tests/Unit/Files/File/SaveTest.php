<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Files\File;

test('success - save method creates empty file', function () {
    $filename = sys_get_temp_dir() . '/test_save.txt';

    if (file_exists($filename)) {
        unlink($filename);
    }

    $file = new File($filename);
    $file->save();

    expect(file_exists($filename))->toBeTrue()
        ->and(file_get_contents($filename))->toBe('');

    unlink($filename);
});
