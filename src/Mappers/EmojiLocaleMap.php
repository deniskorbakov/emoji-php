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
     * @return array<int, array<string, mixed>>
     * @throws FileNotFoundException
     */
    public function combine(): array
    {
        /** @var array<int, array<string, mixed>> $emojis */
        $emojis = $this->localeFile->read();
        /** @var array<int, array<string, mixed>> $cldrCodes */
        $cldrCodes = $this->cldrFile->read();
        /** @var array<string, array<int, array<string, mixed>>> $groups */
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

            $emoji['group'] = $groups['groups'][$groupNumber]['message'];

            if (array_key_exists('order', $emoji)) {
                unset($emoji['order']);
            }
        }

        unset($emoji);

        return array_values($emojis);
    }
}
