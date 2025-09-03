#!/usr/bin/env php
<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use DenisKorbakov\EmojiPhp\Commands\Arguments\ConsoleArguments;
use DenisKorbakov\EmojiPhp\Commands\EmojiGenerateCommand;

$command = new EmojiGenerateCommand(
    new ConsoleArguments($argv)
);

$command->execute();
