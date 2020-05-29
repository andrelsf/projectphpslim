<?php

const APP_ROOT = __DIR__ . '/..';

/**
 * Loader all configs
 */
require APP_ROOT . '/bootstrap.php';

/**
 * Load Routers
 */
require APP_ROOT . '/config/routes.php';

/**
 * Running APP
 */
$app->run();
