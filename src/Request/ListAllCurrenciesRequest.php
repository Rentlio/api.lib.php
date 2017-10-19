<?php

namespace Rentlio\Api\Request;

class ListAllCurrenciesRequest extends AbstractRequest
{
    public function __construct()
    {
        parent::__construct("GET", "/enums/currencies");
    }

    public function getQueryParams()
    {
        return [];
    }
}