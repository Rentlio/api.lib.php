<?php

namespace Rentlio\Api\Request;

/**
 * Class ListAllArrivalArrangementsRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing all arrival arrangements supported for a guest used in rentl.io
 * This is enumeration, that can be used inside other api calls, when needed.
 */
class ListAllArrivalArrangementsRequest extends AbstractRequest
{
    public function __construct()
    {
        parent::__construct("GET", "/enums/guests/arrival-arrangements");
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }
}