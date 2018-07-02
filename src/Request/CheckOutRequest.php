<?php

namespace Rentlio\Api\Request;

/**
 * Class CheckOutRequest
 * @package Rentlio\Api\Request
 *
 * PUT Request to make a check-out for reservation specified with the id.
 * https://docs.rentl.io/#reservations-check-out
 */
class CheckOutRequest extends AbstractRequest
{
    public function __construct($id)
    {
        parent::__construct("PUT", "/reservations/" . $id . "/checkout");
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }
}