<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Commands\Arguments;

use DenisKorbakov\EmojiPhp\Commands\Arguments\Exceptions\EmptyArgument;

final class ConsoleArguments implements Arguments
{
	/** @param array<int, string> $arguments */
	public function __construct(
		public array $arguments,
	) {
	}

	/**
	 * @throws EmptyArgument
	 */
	public function show(int $key): string
	{
		if (!array_key_exists($key, $this->arguments)) {
			throw new EmptyArgument();
		}

		return $this->arguments[$key];
	}

	public function all(): array
	{
		return $this->arguments;
	}
}
