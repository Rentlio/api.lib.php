<?php

namespace Rentlio\Api\Request;

class ListAllReservationsTodayForUnitRequest extends AbstractRequest
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