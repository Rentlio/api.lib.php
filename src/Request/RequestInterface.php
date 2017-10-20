<?php

namespace Rentlio\Api\Request;

/**
 * Interface RequestInterface
 * @package Rentlio\Api\Request
 *
 * Methods each Rentlio Api request has to implement
 */
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

    /**
     * @return array
     */
    public function getSortAndPagingParams();

    /**
     * @return array
     */
    public function getQueryParams();
}