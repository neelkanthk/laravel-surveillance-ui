![Laravel Surveillance UI Logo](https://github.com/neelkanthk/repo_logos/blob/master/LaravelSurveillanceUI_small.png?raw=true)

![](https://img.shields.io/github/v/release/neelkanthk/laravel-surveillance-ui?style=for-the-badge)
![](https://img.shields.io/packagist/php-v/neelkanthk/laravel-surveillance-ui.svg?style=for-the-badge)
![](https://img.shields.io/badge/Laravel-%3E%3D6.0-red?style=for-the-badge)
![](https://img.shields.io/github/stars/neelkanthk/laravel-surveillance-ui?style=for-the-badge)
![](https://img.shields.io/github/issues/neelkanthk/laravel-surveillance-ui?style=for-the-badge)
![](https://img.shields.io/github/license/neelkanthk/laravel-surveillance-ui?style=for-the-badge)

## What is Laravel Surveillance UI?

Provides a Graphical UI for [Laravel Surveillance](https://github.com/neelkanthk/laravel-surveillance) and integrates within your existing application.

## What is Laravel Surveillance?

Laravel Surveillance is a package to put malicious users, IP addresses and anonymous browser fingerprints under surveillance, write surveillance logs and block malicious ones from accessing the app. [Read more](https://github.com/neelkanthk/laravel-surveillance#laravel-surveillance-)

## Laravel Surveillance UI Demo

[![](https://raw.githubusercontent.com/neelkanthk/repo_logos/master/LaravelSurveillanceUi-DemoImg.jpg)](https://www.youtube.com/watch?v=G0foqT7WPeA)

## Minimum Requirements

1. Laravel 6.0  
2. PHP 7.2

## Installation  

```bash
composer require neelkanthk/laravel-surveillance-ui
```

## Usage

## Step 1: [Configure Laravel Surveillance](#step-1)

_NOTE:- If you have already installed ```neelkanthk/laravel-surveillance``` in your application then please go directly to Step 2_.


#### 1.1. Publish the migration files:
```bash
php artisan vendor:publish --provider="Neelkanth\Laravel\Surveillance\Providers\SurveillanceServiceProvider" --tag="migrations"
```

#### 1.2. Publish language files:
```bash
php artisan vendor:publish --provider="Neelkanth\Laravel\Surveillance\Providers\SurveillanceServiceProvider" --tag="lang"
```

#### 1.3. Run the migrations
```bash
php artisan migrate
```

#### 1.4. Publish the config file (Optional):
```bash
php artisan vendor:publish --provider="Neelkanth\Laravel\Surveillance\Providers\SurveillanceServiceProvider" --tag="config"
```

[Read more about Laravel Surveillance installation](https://github.com/neelkanthk/laravel-surveillance#installation)

## Step 2: [Configure Laravel Surveillance UI](#step-2)

_The following steps will install Laravel Surveillance UI in your application_.

#### 2.1. Publish views:
```bash
php artisan vendor:publish --provider="Neelkanth\Laravel\SurveillanceUi\Providers\SurveillanceUiServiceProvider" --tag="views"
```

#### 2.2. Publish config:
```bash
php artisan vendor:publish --provider="Neelkanth\Laravel\SurveillanceUi\Providers\SurveillanceUiServiceProvider" --tag="config"
```

#### 2.3. Publish assets:
```bash
php artisan vendor:publish --provider="Neelkanth\Laravel\SurveillanceUi\Providers\SurveillanceUiServiceProvider" --tag="assets"
```

## Add Middleware

Laravel Surveillance provides a ```surveillance``` middleware that can be used on any route or route group to make it eligible for surveillance.

```php
Route::middleware(["surveillance"])->get('/path', function () {});
```

[Read more about middleware usage](https://github.com/neelkanthk/laravel-surveillance#middleware-usage)

## Accessing the Dashboard

The **Laravel Surveillance UI manager dashboard** can be accessed at: http://your.domain/surveillance/ui/manager

The **Laravel Surveillance UI logs dashboard** can be accessed at: http://your.domain/surveillance/ui/logs

## Overriding and customizing the package default configuration

### Customizing the route prefix

By default ```surveillance/ui``` route prefix is appended to the package's routes.

If you want to customize it then you can do so easily in the ```config/surveillance-ui.php``` file's _**prefix**_ key as shown below.

```php
/**
 * The prefix to be used in the surveillance ui routes
 */
"prefix" => "surveillance/ui",
```

### Customizing the route middleware

By default ```web``` middleware is added to the package's routes. 

If you want to add more middlewares like ```auth``` or something else, then you can add them easily in the ```config/surveillance-ui.php``` file's _**middleware**_ key as shown below.

```php
/**
 * The middleware(s) to be used in the surveillance ui routes
 */
"middleware" => ["web", "auth"], //auth middleware added
```

### Customizing the views

After publishing the package views you can change the design as per your taste.
The views are published inside your project's ```resources/views/vendor/surveillance-ui``` directory.

### Customizing the JS and CSS

After publishing the package assets you can tweak the JS and CSS inside your project's ```public/surveillance-ui``` directory.

### Replacing the default logo

You can change the default CCTV logo and favicon displayed on the Surveillance Dashboard by replacing them with your own at ```public/surveillance-ui/images/logo.png``` and ```public/surveillance-ui/images/favicon.ico```.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## Security
If you discover any security-related issues, please email me.neelkanth@gmail.com instead of using the issue tracker.

## Credits

- [Neelkanth Kaushik](https://github.com/neelkanthk)
- [All Contributors](../../contributors)

## License
[MIT](https://choosealicense.com/licenses/mit/)