<?php

namespace Rentlio\Api\Request;

use GuzzleHttp\Psr7\Request;

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
}