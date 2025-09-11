<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Files\File;

test('success - write method writes data to file', function () {
    $filename = tempnam(sys_get_temp_dir(), 'test');
    $file = new File($filename);

    $file->write('new content');

    expect(file_get_contents($filename))->toBe('new content');

    unlink($filename);
});

test('success - write method creates file if not exists', function () {
    $filename = sys_get_temp_dir() . '/test_write_create.txt';
    if (file_exists($filename)) {
        unlink($filename);
    }

    $file = new File($filename);
    $file->write('content');

    expect(file_exists($filename))->toBeTrue()
        ->and(file_get_contents($filename))->toBe('content');

    unlink($filename);
});
