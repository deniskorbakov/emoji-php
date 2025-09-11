<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Files;

use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;

final readonly class FileJson
{
    public function __construct(
        public BaseFile $file,
    ) {
    }

    /**
     * @throws FileNotFoundException
     */
    public function read(): array
    {
        return json_decode($this->file->read(), true);
    }

    public function write(array $data): void
    {
        $this->file->write(
            json_encode($data, JSON_PRETTY_PRINT)
        );
    }

    public function exists(): bool
    {
        return $this->file->exists();
    }
}
