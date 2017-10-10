<?php

namespace Rentlio\Api\Request;

class ListAllReservationStatusesRequest extends AbstractRequest
{
    public function __construct(array $headers = [], $body = null, $version = '1.1')
    {
        parent::__construct("GET", "/enums/reservations/statuses", $headers, $body, $version);
    }

    public function getQueryParams()
    {
        return [];
    }
}