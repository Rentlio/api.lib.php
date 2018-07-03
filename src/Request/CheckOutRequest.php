<?php

namespace Rentlio\Api\Request;

use Rentlio\Api\Request\Data\CheckOut;

/**
 * Class CheckOutRequest
 * @package Rentlio\Api\Request
 *
 * PUT Request to make a check-out for reservation specified with the id.
 * https://docs.rentl.io/#reservations-check-out
 */
class CheckOutRequest extends AbstractRequest
{
    /**
     * @var CheckOut
     */
    protected $checkOut;

    public function __construct($id, CheckOut $checkOut = null)
    {
        parent::__construct("PUT", "/reservations/" . $id . "/checkout");
        $this->checkOut = $checkOut;
    }

    /**
     * @param CheckOut $update
     * @return $this
     */
    public function setCheckOut(CheckOut $checkOut)
    {
        $this->checkOut = $checkOut;
        return $this;
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }

    /**
     * @return array
     */
    public function getSortAndPagingParams()
    {
        return [];
    }

    /**
     * @return CheckOut
     */
    public function jsonSerialize()
    {
        return $this->checkOut;
    }

}