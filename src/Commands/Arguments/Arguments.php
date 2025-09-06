<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Commands\Arguments;

interface Arguments
{
	/** @return array<int, string> */
	public function all(): array;

	public function show(int $key): string;
}
