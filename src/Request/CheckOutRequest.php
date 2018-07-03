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
    /**
     * @var boolean
     */
    protected $checkOut;

    public function __construct($id, $checkOut = null)
    {
        parent::__construct("PUT", "/reservations/" . $id . "/checkout");
        $this->checkOut = $checkOut;
    }

    /**
     * @param boolean $checkOut
     * @return $this
     */
    public function setCheckOut($checkOut)
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
        return [
            'checkOut' => $this->checkOut
        ];
    }

}