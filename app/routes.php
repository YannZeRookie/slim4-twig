<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpNotFoundException;
use Slim\Views\Twig;

use App\Controllers\HelloController;

global $app;

$app->get('/hello[/{name}]', function (Request $request, Response $response, $args) {
    $session = new \SlimSession\Helper();
    $data = HelloController::hello($request, $response, $args, $session);
    $view = Twig::fromRequest($request);
    return $view->render($response, 'hello.twig', $data);
});


/**
 * Catch-all route to serve a 404 Not Found page if none of the routes match
 * NOTE: make sure this route is defined last
 */
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new HttpNotFoundException($request);
});
