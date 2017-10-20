<?php

namespace Rentlio\Api\Request;

/**
 * Class ListAllReservationsTodayForUnitRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing all checkedIn reservations today in some unit
 * Usually only one reservations should be returned. If there are more, this means you have
 * overbooking or you didn't checkout previous guest.
 */
class ListAllReservationsTodayForUnitRequest extends AbstractRequest
{
    public function __construct($unitId)
    {
        parent::__construct("GET", "/units/" . $unitId . "/reservations/today");
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }
}