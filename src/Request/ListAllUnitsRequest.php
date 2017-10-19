<?php

namespace Rentlio\Api\Request;

class ListAllUnitsRequest extends AbstractRequest
{
    public function __construct($id)
    {
        parent::__construct("GET", "/properties/" . $id . "/units");
    }

    public function getQueryParams()
    {
        return [];
    }
}