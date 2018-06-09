<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use GuzzleHttp\Client;


class ApiController
{
    public function index()
    {
        $client = new Client([
            'base_uri' => 'http://auth-service:8080',
            'timeout' => 2.0
        ]);

        $response = $client->request('GET', '/');

        $jsonResponse = new JsonResponse(['ping' => json_decode($response->getBody())], 200);
        $jsonResponse->headers->set('Access-Control-Allow-Origin', '*');
        $jsonResponse->headers->set('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept');

        return $jsonResponse;
    }
}