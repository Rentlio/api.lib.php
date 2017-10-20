<?php

namespace Rentlio\Api\Request;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

/**
 * Class AbstractRequest
 * @package Rentlio\Api\Request
 *
 * This class handles creating request URI with all query params
 * for pagination and sorting.
 *
 * Default values are set here. Each concrete implementation can override this query params
 * by implementing RequestInterface methods
 */
abstract class AbstractRequest extends Request implements RequestInterface, \JsonSerializable
{
    /**
     * @var string
     */
    protected $sortBy = "id";

    /**
     * @var string Possible values are ASC and DESC
     */
    protected $sortOrder = "ASC";

    /**
     * @var int
     */
    protected $page = 1;

    public function setSortBy($column)
    {
        $this->sortBy = $column;
        return $this;
    }

    public function setSortOrder($order)
    {
        $this->sortOrder = $order;
        return $this;
    }

    public function setPage($pageNumber)
    {
        $this->page = $pageNumber;
        return $this;
    }

    /**
     * This method takes all query params from request and appends them to url
     *
     * @return \Psr\Http\Message\UriInterface
     */
    public function getUri()
    {
        $uri                 = parent::getUri();
        $sortAndPagingParams = $this->getSortAndPagingParams();
        foreach ($sortAndPagingParams as $param => $value) {
            if (!is_null($value)) {
                $uri = Uri::withQueryValue($uri, $param, $value);
            }
        }

        $queryParams = $this->getQueryParams();
        foreach ($queryParams as $param => $value) {
            if (!is_null($value)) {
                $uri = Uri::withQueryValue($uri, $param, $value);
            }
        }

        return $uri;
    }

    /**
     * Return default query params for pagination and sorting
     *
     * @return array
     */
    public function getSortAndPagingParams()
    {
        return [
            'order_by'        => $this->sortBy,
            'order_direction' => $this->sortOrder,
            'page'            => $this->page
        ];
    }

    /**
     * Default value for request body is null.
     * Request that wants to send some body data, needs to implement this method and return
     * some data that can be json encoded
     * @return null
     */
    public function jsonSerialize()
    {
        return null;
    }
}