<?php

namespace Rentlio\Api\Request;

class ListAllReservationsTodayForAUnitRequest extends AbstractRequest
{
    public function __construct($unitId, array $headers = [], $body = null, $version = '1.1')
    {
        parent::__construct("GET", "/units/" . $unitId . "/reservations/today", $headers, $body, $version);
    }


    public function getQueryParams()
    {
        return [];
    }
}