<?php

namespace Rentlio\Api\Request;

class ListAllUnitsRequest extends AbstractRequest
{
    protected $id;

    public function __construct($id, array $headers = [], $body = null, $version = '1.1')
    {
        parent::__construct("GET", "/properties/" . $id . "/units", $headers, $body, $version);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getQueryParams()
    {
        return [];
    }
}
?>