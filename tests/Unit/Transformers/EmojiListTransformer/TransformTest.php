<?php

declare(strict_types=1);

use DenisKorbakov\EmojiPhp\Transformers\EmojiListTransformer;

test('transform handles special characters in values', function (): void {
    $emojisList = ["'😊' => 'smilingface'", "'😂' => 'smilingface2'"];
    $transformer = new EmojiListTransformer($emojisList);

    $result = $transformer->transform();

    expect($result)->toBe("<?php return ['😊' => 'smilingface','😂' => 'smilingface2'];");
});

test('transform handles empty string values', function (): void {
    $emojisList = ["'😊' => ''", "'😂' => 'smilingface2'"];
    $transformer = new EmojiListTransformer($emojisList);

    $result = $transformer->transform();

    expect($result)->toBe("<?php return ['😊' => '','😂' => 'smilingface2'];");
});
