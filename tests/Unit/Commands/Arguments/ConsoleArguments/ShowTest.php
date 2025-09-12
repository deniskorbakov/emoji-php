<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Commands\Arguments\ConsoleArguments;
use DenisKorbakov\EmojiPhp\Commands\Arguments\Exceptions\EmptyArgument;

test('success - show returns argument at existing key', function (): void {
    $arguments = new ConsoleArguments(['arg1', 'arg2', 'arg3']);

    expect($arguments->show(0))->toBe('arg1')
        ->and($arguments->show(1))->toBe('arg2')
        ->and($arguments->show(2))->toBe('arg3');
});

test('fail - show throws EmptyArgument for non-existent key', function (): void {
    $arguments = new ConsoleArguments(['arg1']);

    expect(fn(): string => $arguments->show(1))->toThrow(EmptyArgument::class)
        ->and(fn(): string => $arguments->show(999))->toThrow(EmptyArgument::class);
});

test('fail - show throws EmptyArgument for empty arguments', function (): void {
    $arguments = new ConsoleArguments([]);

    expect(fn(): string => $arguments->show(0))->toThrow(EmptyArgument::class);
});
