<?php

namespace Project;

use Slim\App as SlimApp;

class App
{
  /**
   * @var SlimApp
   */
  private $app;

  public function __construct($container)
  {
    $app = new SlimApp($container);

    /**
     * Load Routers
     */
    require APP_ROOT . '/config/routes.php';

    $this->app = $app;
  }

  public function getApp()
  {
    return $this->app;
  }
}