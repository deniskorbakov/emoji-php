<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Files\File;

test('success - exists method returns correct status', function () {
    $existingFile = tempnam(sys_get_temp_dir(), 'test');
    $nonExistingFile = '/non/existent/file.txt';

    $file1 = new File($existingFile);
    $file2 = new File($nonExistingFile);

    expect($file1->exists())->toBeTrue()
        ->and($file2->exists())->toBeFalse();

    unlink($existingFile);
});
