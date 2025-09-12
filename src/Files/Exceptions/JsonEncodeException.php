<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Files\Exceptions;

use Exception;

final class JsonEncodeException extends Exception
{
    public function __construct()
    {
        parent::__construct('Err encode json data');
    }
}
