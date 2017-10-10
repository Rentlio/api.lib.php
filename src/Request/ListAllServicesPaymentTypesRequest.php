<?php

namespace Rentlio\Api\Request;


class ListAllServicesPaymentTypesRequest extends AbstractRequest
{
    public function __construct(array $headers = [], $body = null, $version = '1.1')
    {
        parent::__construct("GET", "/enums/services/payment-types", $headers, $body, $version);
    }

    public function getQueryParams()
    {
        return [];
    }
}