<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;

test('success - read method reads file content', function () {
    $filename = tempnam(sys_get_temp_dir(), 'test');
    file_put_contents($filename, 'test content');

    $file = new File($filename);

    expect($file->read())->toBe('test content');

    unlink($filename);
});

test('fail - read method throws exception for non-existent file', function () {
    $file = new File('/non/existent/file.txt');

    $file->read();
})->throws(FileNotFoundException::class);
