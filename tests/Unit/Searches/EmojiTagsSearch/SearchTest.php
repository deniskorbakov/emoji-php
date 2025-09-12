<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Searches\EmojiTagsSearch;

test('search returns emoji when tags contain search text', function () {
    $emoji = ['tags' => ['happy', 'smile'], 'code' => '😊'];
    $search = new EmojiTagsSearch($emoji, 'happy');

    expect($search->search())->toBe($emoji);
});

test('search returns empty array when tags do not contain search text', function () {
    $emoji = ['tags' => ['happy', 'smile'], 'code' => '😊'];
    $search = new EmojiTagsSearch($emoji, 'sad');

    expect($search->search())->toBe([]);
});

test('search is case insensitive', function () {
    $emoji = ['tags' => ['Happy', 'Smile'], 'code' => '😊'];
    $search = new EmojiTagsSearch($emoji, 'happy');

    expect($search->search())->toBe($emoji);
});
