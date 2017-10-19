<?php

namespace Rentlio\Api\Request;

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