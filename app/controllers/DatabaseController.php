<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once __DIR__ . '/../models/test.php';

class DatabaseController
{
    public static function database(Request $request, Response $response, $args)
    {
        $results = Test::all();
        return ['results' => $results];
    }
}
