<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Commands\Outputs;

final readonly class ConsoleOutput implements Output
{
    public const string ERROR_PREFIX = 'Error: ';
    public const string SUCCESS_PREFIX = 'Success: ';

    public function __construct(
        public string $message,
    ) {
    }

    public function error(): void
    {
        echo self::ERROR_PREFIX . $this->message . PHP_EOL;
    }

    public function success(): void
    {
        echo self::SUCCESS_PREFIX . $this->message . PHP_EOL;
    }
}
