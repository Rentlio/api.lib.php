<?php

namespace Rentlio\Api\Request;

use Rentlio\Api\Request\Data\CheckIn;

/**
 * Class CheckInRequest
 * @package Rentlio\Api\Request
 *
 * PUT Request to make a check-in for reservation specified with the id.
 * https://docs.rentl.io/#reservations-check-in
 */
class CheckInRequest extends AbstractRequest
{
    /**
     * @var CheckIn
     */
    protected $checkIn;

    public function __construct($id, CheckIn $checkIn = null)
    {
        parent::__construct("PUT", "/reservations/" . $id . "/checkin");
        $this->checkIn = $checkIn;
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
     * @return CheckIn
     */
    public function jsonSerialize()
    {
        return $this->checkIn;
    }
}