# Emoji PHP

<a href="https://github.com/deniskorbakov/emoji-php"><img alt="GitHub Workflow Status" src="https://github.com/deniskorbakov/emoji-php/actions/workflows/lint.yml/badge.svg"></a>
<a href="https://github.com/deniskorbakov/emoji-php"><img alt="GitHub Workflow Status" src="https://github.com/deniskorbakov/emoji-php/actions/workflows/tests.yml/badge.svg"></a>
<a href="https://packagist.org/packages/deniskorbakov/emoji-php"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/deniskorbakov/emoji-php"></a>
<a href="https://packagist.org/packages/deniskorbakov/emoji-php"><img alt="Latest Version" src="https://img.shields.io/packagist/v/deniskorbakov/emoji-php"></a>
<a href="https://packagist.org/packages/deniskorbakov/emoji-php"><img alt="License" src="https://img.shields.io/packagist/l/deniskorbakov/emoji-php"></a>

✨ Supports CLDR emoticon storage standard

🌏 Multilingual search from 25 languages

🪄 Replacing unicode emoticons in CLDR format and vice versa

@ This library uses a database of emoticons from - [link](https://github.com/milesj/emojibase)

## 📝 Getting Started

Install the package via composer:
```shell
composer require deniskorbakov/emoji-php
```

Now you can use the class with emoticons:
```php
use DenisKorbakov\EmojiPhp\Emojis;

new Emojis();
```

Below we will consider the functionality of this class.

## 📖 Examples & Usage

This method outputs a grouping of emoticons with a cldr code based on the selected language

```php
use DenisKorbakov\EmojiPhp\Emojis;
use DenisKorbakov\EmojiPhp\Locale;

new Emojis()->list(Locale::EN);
// return ['smileys & emotion' => ['😀' => ':grinning_face:', ...]]
```

---

This method converts the unicode of the emoji to the cldr code

```php
use DenisKorbakov\EmojiPhp\Emojis;

$text = 'Hello, world! 🌍️'

new Emojis()->toCode($text);
// return 'Hello, world! :globe_showing_europe_africa:'
```

---

This method converts the one unicode emoji to the cldr code

```php
use DenisKorbakov\EmojiPhp\Emojis;

$emoji = '🌍'

new Emojis()->codeByEmoji($text);
// return ':globe_showing_europe_africa:'
```

---

This method converts from cldr code with text to unicode emojis

```php
use DenisKorbakov\EmojiPhp\Emojis;

$text = 'Hello :waving_hand:';

new Emojis()->toEmoji($text);
// return 'Hello 👋'
```

---

This method converts one cldr code to unicode emoji

```php
use DenisKorbakov\EmojiPhp\Emojis;

$text = ':waving_hand:';

new Emojis()->emojiByCode($text);
// return '👋'
```

---

This method searches for emoticons by the word, and you also explicitly specify which language to search in

```php
use DenisKorbakov\EmojiPhp\Emojis;
use DenisKorbakov\EmojiPhp\Locale;

$searchText = 'shoe'

new Emojis()->search(Locale::EN, $searchText);
// return ['👞' => ':mans_shoe:', ...]
```

## ⚒️ Local Development

Clone this repository:
```bash
git clone https://github.com/deniskorbakov/emoji-php
```

Let's go to the cloned repository:
```bash
cd emoji-php
```

To start, initialize the project and use it:
```bash
make init
```

## 🧪 Testing

You can run the command for testing after the step with local installation

Run Lint and Analyze code(phpstan/rector/phpcs):
```bash
make lint
```

Run Unit tests:
```bash
make test
```

Run test coverage:
```bash
make test-coverage
```

## 🤝 Feedback

We appreciate your support and look forward to making our product even better with your help!

[@Denis Korbakov](https://github.com/deniskorbakov)

---

📝 Generated from [deniskorbakov/skeleton-php-docker](https://github.com/deniskorbakov/skeleton-php-docker)
