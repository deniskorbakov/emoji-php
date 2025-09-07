<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Mappers;

use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\FileJson;

final readonly class EmojiLocaleMapper implements Mapper
{
    public function __construct(
        public FileJson $sourceFile,
        public FileJson $targetFile,
    ) {
    }

	/**
	 * @throws FileNotFoundException
	 */
	public function combine(): array
    {
        $emojis = $this->sourceFile->read();
        $cldrCodes = $this->targetFile->read();

        foreach ($emojis as &$emoji) {
            $hexCodeKey = $emoji['hexcode'];

            $emoji['code'] = $cldrCodes[$hexCodeKey] ?? null;

            unset($emoji['hexcode']);
        }

        return $emojis;
    }
}
