<?php

namespace Rentlio\Api;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use Rentlio\Api\Request\RequestInterface;

class Client
{
    /**
     * Base URL for rentl.io production API. Currently v1 version
     *
     * @var string
     */
    protected $baseApiUrl = 'https://api.rentl.io/v1';

    /**
     * Api key has to be sent in request header for Authentication and Authorization
     *
     * @var string
     */
    protected $apiKey;

    /**
     * GuzzleHttp client that is used as transport for sending http requests
     *
     * @var \GuzzleHttp\Client
     */
    protected $transport;

    /**
     * Request timeout in seconds.
     *
     * @var integer
     */
    protected $timeout = 10;


    /**
     * Client constructor.
     * @param $apiKey string
     */
    public function __construct($apiKey)
    {
        $this->apiKey    = $apiKey;
        $this->transport = new \GuzzleHttp\Client([
            'timeout'  => $this->timeout,
            'base_url' => $this->baseApiUrl,
            'curl'     => [
                CURLOPT_SSLVERSION     => CURL_SSLVERSION_TLSv1_2,
                CURLOPT_SSL_VERIFYPEER => false
            ]
        ]);
    }

    /**
     * Allow to change base url. Can be used for staging or test mock servers
     *
     * @param $baseUrl string
     * @return $this
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseApiUrl = $baseUrl;
        return $this;
    }

    /**
     * Change timeout for all rentl.io requests
     *
     * @param $timeout
     * @return $this
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * Send http request to rentl.io api
     *
     * @param RequestInterface $request
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function send(RequestInterface $request)
    {
        $uri = new Uri($this->baseApiUrl . $request->getUri());
        $uri = $this->applyQueryParams($uri, $request);

        $request = $request
            ->withUri($uri)
            ->withAddedHeader('apiKey', $this->apiKey);

        return $this->transport->send($request);
    }

    /**
     * This method takes all query params from request and appends them to url
     *
     * @param UriInterface $uri
     * @param RequestInterface $request
     * @return \Psr\Http\Message\UriInterface|UriInterface
     */
    protected function applyQueryParams(UriInterface $uri, RequestInterface $request)
    {
        $sortAndPagingParams = $request->getSortAndPagingParams();
        foreach ($sortAndPagingParams as $param => $value) {
            $uri = Uri::withQueryValue($uri, $param, $value);
        }

        $queryParams = $request->getQueryParams();
        foreach ($queryParams as $param => $value) {
            $uri = Uri::withQueryValue($uri, $param, $value);
        }

        return $uri;
    }
}