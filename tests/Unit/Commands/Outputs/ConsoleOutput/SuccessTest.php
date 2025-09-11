<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Commands\Outputs\ConsoleOutput;

test('success - echo success', function () {
    $message = 'text success';

    ob_start();
    new ConsoleOutput($message)->success();
    $output = ob_get_clean();

    expect($output)->toContain('Success: ' . $message);
});
