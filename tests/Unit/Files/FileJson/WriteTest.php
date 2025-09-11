<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\FileJson;

test('success - write method encodes array to json and writes to file', function () {
    $tempFile = tempnam(sys_get_temp_dir(), 'test') . '.json';
    $file = new File($tempFile);
    $fileJson = new FileJson($file);

    $data = ['name' => 'test', 'items' => [1, 2, 3]];
    $fileJson->write($data);

    $content = file_get_contents($tempFile);
    expect(json_decode($content, true))->toBe($data)
        ->and($content)->toContain("\n");

    unlink($tempFile);
});

test('success - write method creates file if not exists', function () {
    $tempFile = sys_get_temp_dir() . '/test_write.json';
    if (file_exists($tempFile)) {
        unlink($tempFile);
    }

    $file = new File($tempFile);
    $fileJson = new FileJson($file);

    $fileJson->write(['test' => 'data']);

    expect(file_exists($tempFile))->toBeTrue();

    unlink($tempFile);
});
