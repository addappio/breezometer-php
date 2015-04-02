<?php

require __DIR__ . '/../vendor/autoload.php';

$breezometer = new \Addapp\Breezometer\Breezometer('your_api_key');

// $info = $breezometer->baqi('40.7324296', '-73.9977264');

$info = $breezometer->baqiFromLocation('New+York');

var_dump($info); exit;
