<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Emojis;
use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Locale;

test('success - search ru smile emoji', function () {
    $result = new Emojis()->search(Locale::RU, 'уф');

    expect($result)
        ->toBeArray()
        ->toHaveKeys(
            [
                '👞',
                '🥿',
                '👠',
                '🩰',
            ]
        );
});

test('success - search en smile emoji', function () {
    $result = new Emojis()->search(Locale::EN, 'sh');

    expect($result)
        ->toBeArray()
        ->toHaveKeys(
            [
                '👞',
                '🥿',
                '👠',
                '🩰',
            ]
        );
});

test('success - search one char text smile emoji', function () {
    $result = new Emojis()->search(Locale::RU, 'y');

    expect($result)
        ->toBeArray()
        ->toBeEmpty();
});

test('success - search empty text smile emoji', function () {
    $result = new Emojis()->search(Locale::RU, '');

    expect($result)
        ->toBeArray()
        ->toBeEmpty();
});

test('fail - not found locale', function () {
    new Emojis()->search(Locale::ET, 'inimesed');
})->throws(FileNotFoundException::class);
