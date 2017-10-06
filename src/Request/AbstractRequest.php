<?php

namespace Rentlio\Api\Request;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

abstract class AbstractRequest extends Request implements RequestInterface
{
    protected $sortBy = "id";
    protected $sortOrder = "ASC";
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
     * @return \Psr\Http\Message\UriInterface|UriInterface
     */
    public function getUri()
    {
        $uri                 = parent::getUri();
        $sortAndPagingParams = $this->getSortAndPagingParams();
        foreach ($sortAndPagingParams as $param => $value) {
            $uri = Uri::withQueryValue($uri, $param, $value);
        }

        $queryParams = $this->getQueryParams();
        foreach ($queryParams as $param => $value) {
            $uri = Uri::withQueryValue($uri, $param, $value);
        }

        return $uri;
    }

    public function getSortAndPagingParams()
    {
        return [
            'order_by'        => $this->sortBy,
            'order_direction' => $this->sortOrder,
            'page'            => $this->page
        ];
    }
}