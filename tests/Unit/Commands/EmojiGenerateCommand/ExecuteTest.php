<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Commands\Arguments\Arguments;
use DenisKorbakov\EmojiPhp\Commands\EmojiGenerateCommand;
use Mockery\MockInterface;

test('success - execute command', function (): void {
    $arguments = mock(Arguments::class, function (MockInterface $mock): void {
        $mock->shouldReceive('show')->with(1)->andReturn('ru');
    });

    ob_start();
    new EmojiGenerateCommand($arguments)->execute();
    $output = ob_get_clean();

    expect($output)->toContain(EmojiGenerateCommand::SUCCESS_SAVE);
});

test('fail - locale not found execute command', function (): void {
    $arguments = mock(Arguments::class, function (MockInterface $mock): void {
        $mock->shouldReceive('show')->with(1)->andReturn('ruz');
    });

    ob_start();
    new EmojiGenerateCommand($arguments)->execute();
    $output = ob_get_clean();

    expect($output)->toContain(EmojiGenerateCommand::ERROR_LOCALE);
});
