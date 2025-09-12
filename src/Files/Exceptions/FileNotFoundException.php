<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Files\Exceptions;

use Exception;
use Throwable;

final class FileNotFoundException extends Exception
{
    public function __construct(string $filename = "", int $code = 0, ?Throwable $previous = null)
    {
        $message = sprintf('File %s not found', $filename);
        parent::__construct($message, $code, $previous);
    }
}
