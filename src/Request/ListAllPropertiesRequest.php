<?php

namespace Rentlio\Api\Request;

class ListAllPropertiesRequest extends AbstractRequest
{
    protected $name;

    public function __construct(
        $name = "",
        $page = "",
        $order_direction = "",
        $order_by = "",
        array $headers = [],
        $body = null,
        $version = '1.1'
        )
    {
        $uri = "/properties?name=" . $name . "&page=" . $page . "&order_by=" .
        $order_by . "&order_direction=" . $order_direction;        
        parent::__construct("GET", $uri, $headers, $body, $version);
    }
}