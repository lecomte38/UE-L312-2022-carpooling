<?php

use App\Controllers\CarpoolAdsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarpoolAdsController();
echo $controller->getCarpoolAds();
