<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Files;

use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;

final readonly class File
{
    public function __construct(
        public string $filename,
    ) {
    }

    /**
     * @throws FileNotFoundException
     */
    public function read(): string
    {
        if (! file_exists($this->filename)) {
            throw new FileNotFoundException($this->filename);
        }

        return file_get_contents($this->filename, true);
    }

    /**
     * @throws FileNotFoundException
     */
    public function write(string $data): void
    {
        if (! file_exists($this->filename)) {
            throw new FileNotFoundException($this->filename);
        }

        file_put_contents($this->filename, $data);
    }

    public function exists(): bool
    {
        return file_exists($this->filename);
    }

    public function save(): void
    {
        file_put_contents($this->filename, '');
    }
}
