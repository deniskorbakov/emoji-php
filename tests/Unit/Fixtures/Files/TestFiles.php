<?php

declare(strict_types=1);

namespace Tests\Unit\Fixtures\Files;

use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\BaseFile;

final class TestFiles
{
    /**
     * @throws FileNotFoundException
     */
    public function emojiRuData(): string
    {
        return new BaseFile('tests/Unit/Fixtures/Texts/ru_emoji.txt')->read();
    }

    /**
     * @throws FileNotFoundException
     */
    public function codeRuData(): string
    {
        return new BaseFile('tests/Unit/Fixtures/Texts/ru_code.txt')->read();
    }

    /**
     * @throws FileNotFoundException
     */
    public function emojiEnData(): string
    {
        return new BaseFile('tests/Unit/Fixtures/Texts/en_emoji.txt')->read();
    }

    /**
     * @throws FileNotFoundException
     */
    public function codeEnData(): string
    {
        return new BaseFile('tests/Unit/Fixtures/Texts/en_code.txt')->read();
    }

    /**
     * @throws FileNotFoundException
     */
    public function textRuData(): string
    {
        return new BaseFile('tests/Unit/Fixtures/Texts/ru_empty.txt')->read();
    }

    /**
     * @throws FileNotFoundException
     */
    public function textEnData(): string
    {
        return new BaseFile('tests/Unit/Fixtures/Texts/en_empty.txt')->read();
    }

    public function emptyData(): string
    {
        return '';
    }
}
