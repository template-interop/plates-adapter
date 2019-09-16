# template-interop/plates-adapter

[league/plates](https://github.com/league/plates) adapter for [template-interop/engine](https://github.com/template-interop/engine).

## Installation

This package is installable and autoloadable via Composer.

```sh
$ composer require template-interop/plates-adapter
```

## Usage

```php
<?php

use Interop\Template\Plates\PlatesEngine;

$plates = new League\Plates\Engine(__DIR__.'/templates');
$engine = new PlatesEngine($plates);
echo $engine->render('greeting', ['name' => 'John']);
```

You can also use it in conjunction with [template-interop/middleware](https://github.com/template-interop/middleware)
to use it in a HTTP middleware stack application.
