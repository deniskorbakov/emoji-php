<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Commands\Outputs\ConsoleOutput;

test('success - echo error', function () {
    $message = 'text error';

    ob_start();
    new ConsoleOutput($message)->error();
    $output = ob_get_clean();

    expect($output)->toContain('Error: ' . $message);
});
