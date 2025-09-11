<?php

declare(strict_types=1);


use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\FileJson;

test('success - exists method delegates to file exists', function () {
    $existingFile = tempnam(sys_get_temp_dir(), 'test') . '.json';
    $nonExistingFile = '/non/existent/file.json';

    $file1 = new File($existingFile);
    $file1->save();

    $fileJson1 = new FileJson($file1);
    $fileJson2 = new FileJson(new File($nonExistingFile));

    expect($fileJson1->exists())->toBeTrue()
        ->and($fileJson2->exists())->toBeFalse();

    unlink($existingFile);
});
