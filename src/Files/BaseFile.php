<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Files;

use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;

final readonly class BaseFile
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
        if (! $this->exists()) {
            throw new FileNotFoundException($this->filename);
        }

        return file_get_contents($this->filename, true);
    }

    public function write(string $data): void
    {
        if (! $this->exists()) {
            $this->save();
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

    /**
     * @throws FileNotFoundException
     */
    public function execute(): mixed
    {
        if (! file_exists($this->filename)) {
            throw new FileNotFoundException($this->filename);
        }

        return include $this->filename;
    }
}
