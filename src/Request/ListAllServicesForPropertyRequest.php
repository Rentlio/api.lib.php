<?php

namespace Rentlio\Api\Request;

/**
 * Class ListAllServicesForPropertyRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing all services for a property (hotel)
 * https://docs.rentl.io/#services-list-all-services-for-property
 */
class ListAllServicesForPropertyRequest extends AbstractRequest
{
    public function __construct($id)
    {
        parent::__construct("GET", "/properties/" . $id . "/services");
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }
}