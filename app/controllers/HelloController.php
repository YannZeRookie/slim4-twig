<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class HelloController
{
    public static function hello(Request $request, Response $response, $args)
    {
        $name = $args['name'] ?? 'Dave';
        return ['name' => $name];
    }
}
