<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Files;

use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\Exceptions\JsonEncodeException;

final readonly class FileJson
{
    public function __construct(
        public File $file,
    ) {
    }

    /**
     * @return array<string|int, mixed>
     *
     * @throws FileNotFoundException
     */
    public function read(): array
    {
        $decoded = json_decode($this->file->read(), true);

        if (! is_array($decoded)) {
            return [];
        }

        return $decoded;
    }

    /**
     * @param array<string|int, mixed> $data
     * @throws JsonEncodeException
     */
    public function write(array $data): void
    {
        $content = json_encode($data, JSON_PRETTY_PRINT);

        if ($content === false) {
            throw new JsonEncodeException();
        }

        $this->file->write($content);
    }

    public function exists(): bool
    {
        return $this->file->exists();
    }
}
