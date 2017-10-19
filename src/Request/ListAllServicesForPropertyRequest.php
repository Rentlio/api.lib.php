<?php

namespace Rentlio\Api\Request;

class ListAllServicesForPropertyRequest extends AbstractRequest
{
    public function __construct($id)
    {
        parent::__construct("GET", "/properties/" . $id . "/services");
    }

    public function getQueryParams()
    {
        return [];
    }
}