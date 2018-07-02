<?php

namespace Rentlio\Api\Request;

/**
 * Class ListAllUnitTypesRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing all unit types (rooms types) for specific property (hotel)
 * https://docs.rentl.io/#unit-types-list-all-unit-types
 */
class ListAllUnitTypesRequest extends AbstractRequest
{
    public function __construct($id)
    {
        parent::__construct("GET", "/properties/" . $id . "/unit-types");
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }
}