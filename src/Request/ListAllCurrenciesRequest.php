<?php

namespace Rentlio\Api\Request;

/**
 * Class ListAllCurrenciesRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing all currencies used in rentl.io
 * This is enumeration, that can be used inside other api calls, when needed.
 */
class ListAllCurrenciesRequest extends AbstractRequest
{
    public function __construct()
    {
        parent::__construct("GET", "/enums/currencies");
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }
}