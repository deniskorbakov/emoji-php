<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Commands\Arguments\Exceptions;

use Exception;

final class EmptyArgument extends Exception
{
    public function __construct()
    {
        parent::__construct('Argument is empty');
    }
}
