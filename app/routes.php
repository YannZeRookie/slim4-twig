<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpNotFoundException;
use Slim\Views\Twig;


require_once 'controllers/HelloController.php';
$app->get('/hello[/{name}]', function (Request $request, Response $response, $args) {
    $data = HelloController::hello($request, $response, $args);
    $view = Twig::fromRequest($request);
    return $view->render($response, 'hello.twig', $data);
});

require_once 'controllers/DatabaseController.php';
$app->get('/database', function (Request $request, Response $response, $args) {
    $data = DatabaseController::database($request, $response, $args);
    $view = Twig::fromRequest($request);
    return $view->render($response, 'database.twig', $data);
});


/**
 * Catch-all route to serve a 404 Not Found page if none of the routes match
 * NOTE: make sure this route is defined last
 */
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new HttpNotFoundException($request);
});
