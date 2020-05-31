<?php

namespace Project\Controller;

use Slim\Container;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * @author Andre Ferreira
 * @date   29/05/2020
 */
class PingController
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @method __construct
     * @param Container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @method      getPing
     * @desciption  Return message PONG with status 200
     * @param       Request $request
     * @param       Response $response
     * @param       Array $args
     */
    public function getPing(Request $request, Response $response, $args): Response
    {
        return $response->withHeader('Content-Type', 'application/json')
                        ->withJson(
                            [
                                'status' => 200,
                                'message' => 'PONG'
                            ],
                            200,
                            \JSON_PRETTY_PRINT
                        );
    }
}
