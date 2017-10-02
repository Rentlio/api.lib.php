<?php

namespace Rentlio\Api\Request;

class GetMyDataRequest extends AbstractRequest
{

    public function __construct(array $headers = [], $body = null, $version = '1.1')
    {
        parent::__construct("GET", "/users/me", $headers, $body, $version);
    }
}