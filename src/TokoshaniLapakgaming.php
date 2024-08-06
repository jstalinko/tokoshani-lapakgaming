<?php

namespace Jstalinko\TokoshaniLapakgaming;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class TokoshaniLapakgaming
{
    public $client;
    public $endpoint;
    protected $apikey;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => $this->endpoint]);
        $this->endpoint = config('tokoshani-lapakgaming.endpoint');
        $this->apikey = config('tokoshani-lapakgaming.api_key');
    }

    public function getCategories()
    {
        try {
            $response = $this->client->request('GET', 'category', [
                'headers' => [
                    'TOKEN' => $this->apikey,
                    'Authorization' => 'Bearer '.$this->apikey
                ],
                'form_params' => [
                    'category' => 'ROXID',
                    'user_id' => '4611801272130473217',
                ],
            ]);

            // Get the response body
            $body = $response->getBody();
            return $body->getContents();
        } catch (RequestException $e) {
            // Handle exception
            if ($e->hasResponse()) {
                $errorResponse = $e->getResponse();
                return $errorResponse->getStatusCode() . ' - ' . $errorResponse->getReasonPhrase();
            } else {
                return $e->getMessage();
            }
        }
    }

    public function getProductsByCategory($categoryCode)
    {
        try {
            $response = $this->client->request('GET', 'product', [
                'headers' => [
                    'Authorization' => 'Bearer '.$this->apikey
                ],
                'query' => [
                    'category_code' => $categoryCode,
                ],
            ]);

            // Get the response body
            $body = $response->getBody();
            return $body->getContents();
        } catch (RequestException $e) {
            // Handle exception
            if ($e->hasResponse()) {
                $errorResponse = $e->getResponse();
                return $errorResponse->getStatusCode() . ' - ' . $errorResponse->getReasonPhrase();
            } else {
                return $e->getMessage();
            }
        }
    }
    public function getGroupProductsByCategory($categoryCode, $groupProductCode, $countryCode)
    {
        try {
            $response = $this->client->request('GET', 'catalogue/group-products', [
                'headers' => [
                    'Authorization' => 'Bearer '.$this->apikey
                ],
                'query' => [
                    'category_code' => $categoryCode,
                    'group_product_code' => $groupProductCode,
                    'country_code' => $countryCode,
                ],
            ]);

            // Get the response body
            $body = $response->getBody();
            return $body->getContents();
        } catch (RequestException $e) {
            // Handle exception
            if ($e->hasResponse()) {
                $errorResponse = $e->getResponse();
                return $errorResponse->getStatusCode() . ' - ' . $errorResponse->getReasonPhrase();
            } else {
                return $e->getMessage();
            }
        }
    }

    public function getAllProducts()
    {
        try {
            $response = $this->client->request('GET', 'all-products',
        [
            'headers' => [
                'Authorization' => 'Bearer '.$this->apikey
            ]
        ]);

            // Get the response body
            $body = $response->getBody();
            return $body->getContents();
        } catch (RequestException $e) {
            // Handle exception
            if ($e->hasResponse()) {
                $errorResponse = $e->getResponse();
                return $errorResponse->getStatusCode() . ' - ' . $errorResponse->getReasonPhrase();
            } else {
                return $e->getMessage();
            }
        }
    }


    public function createOrder($userId, $additionalId, $countOrder, $productCode)
    {
        try {
            $response = $this->client->request('POST', 'order', [
                'headers' => [
                    'Authorization' => 'Bearer '.$this->apikey
                ],
                'json' => [
                    'user_id' => $userId,
                    'additional_id' => $additionalId,
                    'count_order' => $countOrder,
                    'product_code' => $productCode,
                ],
            ]);

            // Get the response body
            $body = $response->getBody();
            return $body->getContents();
        } catch (RequestException $e) {
            // Handle exception
            if ($e->hasResponse()) {
                $errorResponse = $e->getResponse();
                return $errorResponse->getStatusCode() . ' - ' . $errorResponse->getReasonPhrase();
            } else {
                return $e->getMessage();
            }
        }
    }

    public function getOrderStatus($tid)
    {
        try {
            $response = $this->client->request('GET', 'order_status', [
                'headers' => [
                    'Authorization' => 'Bearer '.$this->apikey
                ],
                'query' => [
                    'tid' => $tid,
                ],
            ]);

            // Get the response body
            $body = $response->getBody();
            return $body->getContents();
        } catch (RequestException $e) {
            // Handle exception
            if ($e->hasResponse()) {
                $errorResponse = $e->getResponse();
                return $errorResponse->getStatusCode() . ' - ' . $errorResponse->getReasonPhrase();
            } else {
                return $e->getMessage();
            }
        }
    }
}
