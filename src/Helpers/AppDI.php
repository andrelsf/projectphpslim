<?php

namespace Project\Helpers;

use Slim\Container;

class AppDI
{
  /**
   * @var Container
   */
  private $container;

  /**
   * @method __construct
   * @var array $settings
   */
  public function __construct(array $settings)
  {
    /**
     * Container Resources:
     * Adiciona as definições
     */
    $container = new Container($settings);

    /**
     * Loader Dependencies
     */
    require APP_ROOT . '/config/dependencies.php';
    
    $this->container = $container;
  }

  /**
   * @return Container
   */
  public function getContainer()
  {
    return $this->container;
  }
}