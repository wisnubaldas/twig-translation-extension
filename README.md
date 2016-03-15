### Twig Translation Extension

Translation functions for Twig provide by [Illuminate/translation](https://github.com/illuminate/translation).

#### Installation

```shell
composer require rafaph/twig-translation-extension
```

#### Usage

* Configure the **Illuminate\Translation\Translator**:

```php
$langPath = __DIR__ . '/lang';
$locale = 'pt';

$translator = new \Illuminate\Translation\Translator(
    new \Illuminate\Translation\FileLoader(
        new \Illuminate\Filesystem\Filesystem(),
        $langPath
    ),
    $locale
);
$translator->setFallback('en');
```

More details about the configurations of the Translator package you can find in the [Laravel docs](https://laravel.com/docs/localization).

* Add Twig extension

```php
// ...
$twig->addExtension(
	new \Raph\Twig\Extension\TranslationExtension($translator)
);
```

* Configure your messages

```php
//in lang/en/messages.php

return [
	'hello' => 'Hello :name!',
	'there' => '{0} There are none|[1,19] There are some|[20,Inf] There are many'
];
```

```php
//in lang/pt/messages.php

return [
	'hello' => 'Olá :name!',
	'there' => '{0} Nenhum|[1,19] Alguns|[20,Inf] Muitos'
];
```

* Use in templates

```html
<h2>{{ trans('messages.hello', {'name': 'Jane Doe'}) }}</h2>
```

```html
<h2>{{ trans_choice('messages.there', 2) }}</h2>
```