<?php

namespace Rentlio\Api\Request;

class ListAllPropertiesRequest extends AbstractRequest
{
    protected $name;

    public function __construct(array $headers = [], $body = null, $version = '1.1')
    {
        parent::__construct("GET", "/properties", $headers, $body, $version);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [
            'name' => $this->name
        ];
    }
}