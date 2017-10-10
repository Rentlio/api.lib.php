<?php

namespace Rentlio\Api\Request;

class ListAllCurrenciesRequest extends AbstractRequest
{
    public function __construct(array $headers = [], $body = null, $version = '1.1')
    {
        parent::__construct("GET", "/enums/currencies", $headers, $body, $version);
    }

    public function getQueryParams()
    {
        return [];
    }
}