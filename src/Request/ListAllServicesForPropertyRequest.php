<?php

namespace Rentlio\Api\Request;

class ListAllServicesForPropertyRequest extends AbstractRequest
{
    public function __construct($id, array $headers = [], $body = null, $version = '1.1')
    {
        parent::__construct("GET", "/properties/" . $id . "/services", $headers, $body, $version);
    }

    public function getQueryParams()
    {
        return [];
    }

}