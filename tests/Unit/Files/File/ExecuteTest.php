<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Files\File;
use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;

test('success - execute method includes php file and returns result', function () {
    $filename = tempnam(sys_get_temp_dir(), 'test') . '.php';
    file_put_contents($filename, '<?php return "executed";');

    $file = new File($filename);

    expect($file->execute())->toBe('executed');

    unlink($filename);
});

test('fail - execute method throws exception for non-existent php file', function () {
    $file = new File('/non/existent/file.php');

    $file->execute();
})->throws(FileNotFoundException::class);
