<?php

namespace Rentlio\Api\Request;

interface RequestInterface extends \Psr\Http\Message\RequestInterface
{
    /**
     * @param $column string
     * @return $this
     */
    public function setSortBy($column);

    /**
     * @param $order string
     * @return $this
     */
    public function setSortOrder($order);

    /**
     * @param $pageNumber integer
     * @return $this
     */
    public function setPage($pageNumber);
}