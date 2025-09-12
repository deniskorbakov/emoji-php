<?php

declare(strict_types=1);

namespace DenisKorbakov\EmojiPhp\Mappers;

use DenisKorbakov\EmojiPhp\Files\Exceptions\FileNotFoundException;
use DenisKorbakov\EmojiPhp\Files\FileJson;

final readonly class EmojiLocaleMap implements Map
{
    public function __construct(
        public FileJson $localeFile,
        public FileJson $cldrFile,
        public FileJson $groupsFile,
    ) {
    }

    /**
     * @throws FileNotFoundException
     */
    public function combine(): array
    {
        $emojis = $this->localeFile->read();
        $cldrCodes = $this->cldrFile->read();
        $groups = $this->groupsFile->read();

        foreach ($emojis as $key => &$emoji) {
            $hexCodeKey = $emoji['hexcode'];

            $emoji['code'] = $cldrCodes[$hexCodeKey] ?? null;

            unset($emoji['hexcode']);

            if (! array_key_exists('group', $emoji)) {
                unset($emojis[$key]);
                continue;
            }

            $groupNumber = $emoji['group'];

            $emoji['group'] = $groups['groups'][$groupNumber]['message'] ?? null;

            if (array_key_exists('order', $emoji)) {
                unset($emoji['order']);
            }
        }

        unset($emoji);

        return array_values($emojis);
    }
}
