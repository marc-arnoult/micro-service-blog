<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;


class ApiController
{
    public function __construct() {
        $this->client = new Client();
    }
    public function index(Request $request)
    {
        $pdo = new \PDO('mysql:host=db;dbname=blog', 'root', 'root');

        $query = $pdo->prepare('SELECT * FROM blog_user');
        $res = $query->execute();

        $jsonResponse = new JsonResponse([
            'ping' => 'ok',
            'res' => $query->fetchAll()
        ], 200);

        return $jsonResponse;
    }

    public function login(Request $request)
    {
        $response = $this->client->request($request->getMethod(), 'http://auth-service:8080/login');

        $jsonResponse = new JsonResponse(json_decode($response->getBody()), 200);

        return $jsonResponse;  
    }

    public function register(Request $request)
    {
        $response = $this->client->request($request->getMethod(), 'http://auth-service:8080/register');

        $jsonResponse = new JsonResponse(json_decode($response->getBody()), 200);

        return $jsonResponse;  
    }
}