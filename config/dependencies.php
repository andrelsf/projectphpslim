<?php

/**
 * Handler Exceptions with ERRORs 404 NOT FOUND
 */
$container['notFoundHandler'] = function ($c) {
  return function ($request, $response) use ($c) {
      return $c['response']->withStatus(404)
                          ->withHeader('Content-Type', 'aaplication/json')
                          ->withJson(
                              [
                                  'status' => 404,
                                  'message' => 'Page not found'
                              ],
                              404,
                              JSON_PRETTY_PRINT
                          );
  };
};

/**
 * Handling returns status 405 Method Not Allowed
 */
$container['notAllowedHandler'] = function ($c) {
  return function ($reques, $response, $methods) use ($c) {
      return $c['response']->withStatus(405)
                          ->withHeader('Allow', implode(', ', $methods))
                          ->withHeader('Content-Type', 'application/json')
                          ->withHeader('Access-Control-Allow-Methods', implode(', ', $methods))
                          ->withJson(
                              [
                                  'status' => 405,
                                  'message' => 'Method not allowed'
                              ],
                              405,
                              JSON_PRETTY_PRINT
                          );
  };
};

/**
 * Handler de exceções
 * Retorna as exceções e codigos de status via JSON
 */
$container['errorHandler'] = function ($c) {
  return function ($request, $response, $exception) use ($c) {
      $statusCode = $exception->getCode() ? $exception->getCode() : 500;
      return $c['response']
                  ->withStatus($statusCode)
                  ->withHeader('Content-Type', 'application/json')
                  ->withJson(
                      [
                          'status' => $exception->getCode(),
                          'error' => $exception->getMessage()
                      ],
                      $statusCode,
                      JSON_PRETTY_PRINT
                  );
  };
};