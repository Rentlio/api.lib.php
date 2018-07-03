<?php

namespace Rentlio\Api\Request;

/**
 * Class GetMyDataRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for getting user data for user associated with given apiKey
 * https://docs.rentl.io/#users-get-my-data
 */
class GetMyDataRequest extends AbstractRequest
{
    public function __construct()
    {
        parent::__construct("GET", "/users/me");
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }
}