<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\FileJson;
use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;

test('success - read method decodes json from file', function () {
    $tempFile = tempnam(sys_get_temp_dir(), 'test') . '.json';
    file_put_contents($tempFile, '{"key": "value", "number": 123}');

    $file = new File($tempFile);
    $fileJson = new FileJson($file);

    expect($fileJson->read())->toBe(['key' => 'value', 'number' => 123]);

    unlink($tempFile);
});

test('fail read method throws exception for non-existent file', function () {
    $file = new File('/non/existent/file.json');
    $fileJson = new FileJson($file);

    $fileJson->read();
})->throws(FileNotFoundException::class);
