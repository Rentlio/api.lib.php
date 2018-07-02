<?php

namespace Rentlio\Api\Request;

/**
 * Class ListAllReservationStatusesRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing all reservation statuses.
 * This is enumeration, that can be used inside other api calls, when needed,
 * for example listing all reservations endpoint accepts status as query param
 * https://docs.rentl.io/#enums-list-all-reservation-statuses
 */
class ListAllReservationStatusesRequest extends AbstractRequest
{
    public function __construct()
    {
        parent::__construct("GET", "/enums/reservations/statuses");
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }
}