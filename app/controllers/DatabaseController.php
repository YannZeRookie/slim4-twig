<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DatabaseController
{
    public static function database(Request $request, Response $response, $args)
    {
        global $database;
        $results = $database->query("SELECT * FROM test")->fetchAll();
        return ['results' => $results];
    }
}
