<?php

namespace Rentlio\Api\Request;

class ListAllReservationStatusesRequest extends AbstractRequest
{
    public function __construct()
    {
        parent::__construct("GET", "/enums/reservations/statuses");
    }

    public function getQueryParams()
    {
        return [];
    }
}