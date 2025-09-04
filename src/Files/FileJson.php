<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Files;

final readonly class FileJson
{
    public function __construct(
        public File $file,
    ) {
    }

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
}
