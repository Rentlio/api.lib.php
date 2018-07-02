<?php

namespace Rentlio\Api\Request;

/**
 * Class CheckInRequest
 * @package Rentlio\Api\Request
 *
 * PUT Request to make a check-in for reservation specified with the id.
 * https://docs.rentl.io/#reservations-check-in
 */
class CheckInRequest extends AbstractRequest
{
    public function __construct($id)
    {
        parent::__construct("PUT", "/reservations/" . $id . "/checkin");
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }
}