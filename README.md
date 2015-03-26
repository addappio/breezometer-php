# Breezometer php

[![Latest Version](https://img.shields.io/github/release/nwidart/Breezometer.svg?style=flat-square)](https://github.com/nwidart/Breezometer/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/nwidart/Breezometer/master.svg?style=flat-square)](https://travis-ci.org/nwidart/Breezometer)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/nwidart/Breezometer.svg?style=flat-square)](https://scrutinizer-ci.com/g/nwidart/Breezometer/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/nwidart/Breezometer.svg?style=flat-square)](https://scrutinizer-ci.com/g/nwidart/Breezometer)
[![Total Downloads](https://img.shields.io/packagist/dt/nwidart/Breezometer.svg?style=flat-square)](https://packagist.org/packages/nwidart/Breezometer)

A PHP client package for the [Breezometer](http://breezometer.com/) [API](http://breezometer.com/api/).

## Install

Via Composer

``` bash
$ composer require nwidart/breezometer-php
```

## Usage

``` php
$breezometer = new \Nwidart\Breezometer\Breezometer('your_api_key');

$info = $breezometer->baqi('40.7324296', '-73.9977264');
// or
$info = $breezometer->baqiFromLocation('New+York');
```

Will return something like :

``` json
{
   "country_name" :  "USA",
   "breezometer_aqi" :  49,
   "breezometer_color" :  "#FFF900",
   "breezometer_description" :  "Moderate Air Quality",
   "country_aqi" :  78,
   "country_color" :  "#FFF700",
   "country_description" :  "Moderate Air Quality",
   "data_valid" : true,
   "key_valid" : true,
   "random_recommendations" : {
         "children" :  "Pay attention to the respiratory status of your kid(s)",
         "sport" :  "You want to work out now??!… Only if you have no plan B",
         "health" :  "People with health sensitivities should be prepared for minor respiratory difficulties",
         "inside" :  "We're not going to tell you not to go outside, but you should continue tracking the air quality around you",
         "outside" :  "If you wish to stay outside for a long time, you should try to find a cleaner place nearby"
         },
   "dominant_pollutant_canonical_name" :  "nox",
   "dominant_pollutant_text" : {
         "main" :  "At the moment, nitrogen oxides (NOx) are the main pollutant in the air.",
         "effects" :  "Exposure may cause increased bronchial reactivity in patients with asthma, lung function decline in patients with COPD and increased risk of respiratory infections, especially in young children.",
         "causes" :  "Main sources are fuel burning processes in industry and transportation."
         }
}
```

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Nicolas Widart](https://github.com/nWidart)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
