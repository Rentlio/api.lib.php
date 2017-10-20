<?php

namespace Rentlio\Api\Request;

class ListAllUnitTypesRequest extends AbstractRequest
{
    public function __construct($id)
    {
        parent::__construct("GET", "/properties/" . $id . "/unit-types");
    }

    public function getQueryParams()
    {
        return [];
    }
}