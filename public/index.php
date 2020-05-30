<?php

declare(strict_types=1);

use Project\App;
use Project\Helpers\AppDI;

/**
 * Loader all configs
 */
require __DIR__ . '/../vendor/autoload.php';

$settings = require __DIR__ . '/../config/settings.php';

$container = (new AppDI($settings))->getContainer();
$app = (new App($container))->getApp();

/**
 * Running APP
 */
$app->run();
