<?php

declare(strict_types=1);

use Project\App;
use Project\Helpers\AppDI;

const APP_ROOT = __DIR__ . '/..';

/**
 * Loader all configs
 */
require APP_ROOT . '/vendor/autoload.php';

$settings = require APP_ROOT . '/config/settings.php';

$container = (new AppDI($settings))->getContainer();
$app = (new App($container))->getApp();

/**
 * Running APP
 */
$app->run();
