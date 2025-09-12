<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Searches\EmojiLabelSearch;

test('search returns emoji when label contains search text', function () {
    $emoji = ['label' => 'smiling face', 'code' => '😊'];
    $search = new EmojiLabelSearch($emoji, 'smiling');

    expect($search->search())->toBe($emoji);
});

test('search returns empty array when label does not contain search text', function () {
    $emoji = ['label' => 'smiling face', 'code' => '😊'];
    $search = new EmojiLabelSearch($emoji, 'sad');

    expect($search->search())->toBe([]);
});

test('search is case insensitive', function () {
    $emoji = ['label' => 'Smiling Face', 'code' => '😊'];
    $search = new EmojiLabelSearch($emoji, 'smiling');

    expect($search->search())->toBe($emoji);
});
