<?php

namespace Rentlio\Api\Request;

/**
 * Class ListAllPropertiesRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing all properties (hotels) for user that is
 * associated with given apiKey
 */
class ListAllPropertiesRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected $name;

    public function __construct()
    {
        parent::__construct("GET", "/properties");
    }

    /**
     * @param $name
     * @return $this
     */
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