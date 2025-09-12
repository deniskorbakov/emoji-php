<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Commands\Arguments\ConsoleArguments;

test('success - all returns all arguments', function (): void {
    $args = ['arg1', 'arg2', 'arg3'];
    $arguments = new ConsoleArguments($args);

    expect($arguments->all())->toBe($args);
});

test('success - all returns empty array when no arguments', function (): void {
    $arguments = new ConsoleArguments([]);

    expect($arguments->all())->toBe([]);
});

test('success - all returns exact same array that was passed', function (): void {
    $args = ['test', '123', 'hello world'];
    $arguments = new ConsoleArguments($args);

    expect($arguments->all())->toEqual($args);
});
