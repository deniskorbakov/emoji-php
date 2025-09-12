<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Searches\Keys\EmojiLabelKeySearch;

test('search returns emoji when label contains search text', function (): void {
    $emoji = ['label' => 'smiling face', 'code' => '😊'];
    $search = new EmojiLabelKeySearch($emoji, 'smiling');

    expect($search->search())->toBe($emoji);
});

test('search returns empty array when label does not contain search text', function (): void {
    $emoji = ['label' => 'smiling face', 'code' => '😊'];
    $search = new EmojiLabelKeySearch($emoji, 'sad');

    expect($search->search())->toBe([]);
});

test('search is case insensitive', function (): void {
    $emoji = ['label' => 'Smiling Face', 'code' => '😊'];
    $search = new EmojiLabelKeySearch($emoji, 'smiling');

    expect($search->search())->toBe($emoji);
});
