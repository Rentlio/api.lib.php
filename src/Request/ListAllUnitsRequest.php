<?php

namespace Rentlio\Api\Request;

class ListAllUnitsRequest extends AbstractRequest
{
    public function __construct($id, array $headers = [], $body = null, $version = '1.1')
    {
        parent::__construct("GET", "/properties/" . $id . "/units", $headers, $body, $version);
    }

    public function getQueryParams()
    {
        return [];
    }
}
?>