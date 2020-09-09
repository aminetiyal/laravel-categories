# Laravel-Categories

[![Latest Version on Packagist](https://img.shields.io/packagist/v/aminetiyal/laravel-categories.svg?style=flat-square)](https://packagist.org/packages/aminetiyal/laravel-categories)
[![Build Status](https://img.shields.io/travis/aminetiyal/laravel-categories/master.svg?style=flat-square)](https://travis-ci.org/aminetiyal/laravel-categories)
[![Quality Score](https://img.shields.io/scrutinizer/g/aminetiyal/laravel-categories.svg?style=flat-square)](https://scrutinizer-ci.com/g/aminetiyal/laravel-categories)
[![Total Downloads](https://img.shields.io/packagist/dt/aminetiyal/laravel-categories.svg?style=flat-square)](https://packagist.org/packages/aminetiyal/laravel-categories)

Setup [Category](https://github.com/aminetiyal/laravel-categories/blob/master/src/Category.php) Eloquent Model with 2 Traits [HasCategories](https://github.com/aminetiyal/laravel-categories/blob/master/src/HasCategories.php) and [BelongsToCategories](https://github.com/aminetiyal/laravel-categories/blob/master/src/BelongsToCategories.php)

## Installation

You can install the package via composer:

```bash
composer require aminetiyal/laravel-categories
```

The package will automatically register itself.

the child model table must have `category_id` field with `unsignedBigInteger` type you can achieve that by adding this line in migration file:
``` php
$table->unsignedBigInteger('category_id');
```

## Usage

let's assume that you have **Store** _→hasMany→_ **Category** _→hasMany→_ **Product**
``` php
namespace App;

use Aminetiyal\LaravelCategories\HasCategories;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasCategories;
}
```

``` php
namespace App;

use Aminetiyal\LaravelCategories\Category;
use Illuminate\Database\Eloquent\Model;

class Category extends Category
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
```

``` php
namespace App;

use Aminetiyal\LaravelCategories\BelongsToCategories;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use BelongsToCategories;
}
```
### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email aminetiyal@gmail.com instead of using the issue tracker.

## Credits

- [Amine TIYAL](https://github.com/aminetiyal)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
