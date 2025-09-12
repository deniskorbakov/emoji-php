<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Locale;
use DenisKorbakov\EmojiPhp\Searches\EmojiSearch;

test('search returns empty array for empty text', function () {
    $search = new EmojiSearch(Locale::EN, '');

    expect($search->search())->toBe([]);
});

test('search returns empty array for short text', function () {
    $search = new EmojiSearch(Locale::EN, 'a');

    expect($search->search())->toBe([]);
});

test('success - search', function () {
    $search = new EmojiSearch(Locale::RU, 'уф');

    expect($search->search())->toHaveCount(4);
});
