<?php

namespace App\Service;

use Exception;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;

class CurrencyService
{
    private const BASE_URL = 'https://api.exchangeratesapi.io/latest';
    public const USD = 'USD';
    public const EUR = 'EUR';
    
    public function __construct()
    {
        $this->httpClient = HttpClient::create();
    }

    public function getUSDPrize(float $prize) :float
    {

        $response = $this->httpClient->request('GET', $this::BASE_URL . '?base=' . $this::EUR . '&symbols='. $this::USD);
        if ($response->getStatusCode() === Response::HTTP_OK)
        {
            $content = \json_decode($response->getContent());
            $result = $prize * $content->rates->USD;
            return $result;
        }
    }

    public function getEURPrize($prize) :float
    {
        $response = $this->httpClient->request('GET', $this::BASE_URL . '?base=' . $this::USD . '&symbols='. $this::EUR);
        if ($response->getStatusCode() === Response::HTTP_OK)
        {
            $content = \json_decode($response->getContent());
            $result = $prize * $content->rates->EUR;
            return $result;
        }
    }
}