<?php

namespace Rentlio\Api\Request;

/**
 * Class ListAllServicesPaymentTypesRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing all payment types inside rentl.io
 * This is enumeration, that can be used inside other api calls, when needed.
 * https://docs.rentl.io/#enums-list-all-services-payment-types
 */
class ListAllServicesPaymentTypesRequest extends AbstractRequest
{
    public function __construct()
    {
        parent::__construct("GET", "/enums/services/payment-types");
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }
}