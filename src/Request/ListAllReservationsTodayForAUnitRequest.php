<?php

namespace Rentlio\Api\Request;

class ListAllReservationsTodayForAUnitRequest extends AbstractRequest
{
    public function __construct($unitId)
    {
        parent::__construct("GET", "/units/" . $unitId . "/reservations/today");
    }

    public function getQueryParams()
    {
        return [];
    }
}