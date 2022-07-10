<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class HelloController
{
    public static function hello(Request $request, Response $response, $args, \SlimSession\Helper $session)
    {
        $session_counter = $session->get('count', 0);
        $session_counter++;
        $session->set('count', $session_counter);
        $name = $args['name'] ?? 'Dave';
        return ['name' => $name, 'session_counter' => $session_counter];
    }
}
