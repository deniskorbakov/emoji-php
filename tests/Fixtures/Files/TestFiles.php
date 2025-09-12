<?php

declare(strict_types=1);

namespace Tests\Fixtures\Files;

use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\File;

final class TestFiles
{
    /**
     * @throws FileNotFoundException
     */
    public function emojiRuData(): string
    {
        return new File('tests/Fixtures/Texts/ru_emoji.txt')->read();
    }

    /**
     * @throws FileNotFoundException
     */
    public function codeRuData(): string
    {
        return new File('tests/Fixtures/Texts/ru_code.txt')->read();
    }

    /**
     * @throws FileNotFoundException
     */
    public function emojiEnData(): string
    {
        return new File('tests/Fixtures/Texts/en_emoji.txt')->read();
    }

    /**
     * @throws FileNotFoundException
     */
    public function codeEnData(): string
    {
        return new File('tests/Fixtures/Texts/en_code.txt')->read();
    }

    /**
     * @throws FileNotFoundException
     */
    public function textRuData(): string
    {
        return new File('tests/Fixtures/Texts/ru_empty.txt')->read();
    }

    /**
     * @throws FileNotFoundException
     */
    public function textEnData(): string
    {
        return new File('tests/Fixtures/Texts/en_empty.txt')->read();
    }

    public function emptyData(): string
    {
        return '';
    }
}
