# Laravel Model Masker 

This package is a small PHP library for masking sensitive data.
You can configure various masking strategies just add to the config file.

## Installation

Require this package with composer.

```shell
composer require damiankulon/laravel-model-masker
```

#### Copy the package config to your local config with the publish command:

```shell
php artisan vendor:publish --provider="LaravelModelMasker\ServiceProvider"
```

#### Example config file fur tables
```php
'tables' => [
        \App\User::class    => [
            'name'       => [
                'maskStrategy' => 'starify',
            ],
            'password'   => null, // no action 
            'email'      => [
                'maskStrategy' => 'hashify',
                'options'      => [
                    'template' => "%s@example.com"
                ]
            ]
        ]
]
```

### Laravel 5.7+:

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
LaravelModelMasker\ServiceProvider::class,
```

If you want to use the facade to mask models, add this to your facades in app.php:

```php
'ModelMasker' => LaravelModelMasker\Facade::class,
```

## Usage

```php
$user = User::first();
$masker = new ModelMasker();
$masker->mask($user)->save(); // Mask model attributes and save model

\ModelMasker::mask($user)->save(); // use Facade
```
