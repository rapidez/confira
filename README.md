# Rapidez confira

This package extends `rapidez/checkout-theme` with some parts styled differently.

## Installation

```
composer require rapidez/confira
```

Confira adds the `ct-primary-100` color, which should be added to your tailwind config alongside the other checkout-theme colors like so:

```diff
colors: {
    ct: {
        enhanced: {
            DEFAULT: '#40C42A',
        },
        inactive: {
            DEFAULT: '#8A8275',
            100: '#F6F4EE',
        },
        disabled: '#EBE8DE',
        primary: {
            DEFAULT: '#FEAB05',
+           100: '#FEE8C3'
        },
        neutral: {
            DEFAULT: '#625B50',
        },
        border: '#EAE7DC',
        error: '#DF241D',
    },
},
```

## Configuration

You can publish the config with:
```
php artisan vendor:publish --tag=rapidez-confira-config
```

## Views

You can publish the views with:
```
php artisan vendor:publish --tag=rapidez-confira-views
```

## License

GNU General Public License v3. Please see [License File](LICENSE) for more information.
