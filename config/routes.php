<?php

/**
 * Agrupamento dos endpoints por API
 */
$app->group('/api', function () {
    $this->get('/ping', '\Project\Controller\PingController:getPing');
});
