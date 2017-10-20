<?php

namespace Rentlio\Api\Request;

class ListAllPropertiesRequest extends AbstractRequest
{
    protected $name;

    public function __construct()
    {
        parent::__construct("GET", "/properties");
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
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