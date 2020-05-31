<?php

namespace Project\Tests\Controller;

use Project\App;
use Project\Helpers\AppDI;
use Slim\Http\Request;
use Slim\Http\Environment;
use PHPUnit\Framework\TestCase;

class PingControllerTest extends TestCase
{
    protected $app;

    public function setUp()
    {
        $container = (new AppDI(['settings' => []]))->getContainer();
        $this->app = (new App($container))->getApp();
    }

    /**
     * @test
     * @dataProvider valueDataProvider
     * */
    public function shouldReturnStatus200($mockParams, $expectedValue)
    {
        $env = Environment::mock($mockParams);

        $req = Request::createFromEnvironment($env);
        $this->app->getContainer()['request'] = $req;
        $response = $this->app->run(true);

        $this->assertEquals($expectedValue, $response->getStatusCode());
    }

    public function valueDataProvider()
    {
        return [
          'shouldReturnStatusOK' => [
            'mockParams' => [
              'REQUEST_METHOD' => 'GET',
              'REQUEST_URI' => '/api/ping'
            ],
            'expectedValue' => 200
          ],
          'shouldReturnMethodIsNotAllowed' => [
            'mockParams' => [
              'REQUEST_METHOD' => 'POST',
              'REQUEST_URI' => '/api/ping'
            ],
            'expectedValue' => 405
          ],
        ];
    }
}
