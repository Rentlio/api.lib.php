<?php

namespace Rentlio\Api\Request;

/**
 * Class ListAllUnitsRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing all units (specific rooms/apartments) for specific property (hotel)
 */
class ListAllUnitsRequest extends AbstractRequest
{
    public function __construct($id)
    {
        parent::__construct("GET", "/properties/" . $id . "/units");
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }
}