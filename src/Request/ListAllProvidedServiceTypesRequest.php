<?php

namespace Rentlio\Api\Request;

/**
 * Class ListAllProvidedServiceTypesRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing all provided service types supported for a guest used in rentl.io
 * This is enumeration, that can be used inside other api calls, when needed.
 */
class ListAllProvidedServiceTypesRequest extends AbstractRequest
{
    public function __construct()
    {
        parent::__construct("GET", "/enums/guests/provided-services-types");
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }
}