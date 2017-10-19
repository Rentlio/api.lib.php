<?php

namespace Rentlio\Api\Request;

class ListAllServicesPaymentTypesRequest extends AbstractRequest
{
    public function __construct()
    {
        parent::__construct("GET", "/enums/services/payment-types");
    }

    public function getQueryParams()
    {
        return [];
    }
}