<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Files;

final readonly class File
{
    public function __construct(
        public string $filepath,
    ){
    }

    public function read(): string
    {
        return file_get_contents($this->filepath, true);
    }

    public function write(string $data): void
    {
        file_put_contents($this->filepath, $data);
    }

    public function exists(): bool
    {
        return file_exists($this->filepath);
    }

    public function save(): void
    {
        file_put_contents($this->filepath, '');
    }
}
