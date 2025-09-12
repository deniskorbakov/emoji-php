<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Emojis;
use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Locale;

test('success - get list en emojis', function (): void {
    $result = new Emojis()->list(Locale::EN);

    expect($result)
        ->toBeArray()
        ->toHaveKeys(
            [
                'smileys & emotion',
                'people & body',
                'components',
                'animals & nature',
                'food & drink',
                'travel & places',
                'activities',
                'objects',
                'symbols',
                'flags',
            ]
        );
});

test('success - get list ru emojis', function (): void {
    $result = new Emojis()->list(Locale::RU);

    expect($result)
        ->toBeArray()
        ->toHaveKeys(
            [
                'смайлики и люди',
                'тело людей',
                'компонент',
                'животные и природа',
                'еда и напитки',
                'путешествия и местности',
                'варианты досуга',
                'предметы',
                'символы',
                'флаг',
            ]
        );
});

test('fail - get not found locale', function (): void {
    new Emojis()->list(Locale::ZH);
})->throws(FileNotFoundException::class);
