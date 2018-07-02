<?php

namespace Rentlio\Api\Request;

/**
 * Class ListAllTouristTaxCategoriesRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing all tourist tax categories supported for a guest used in rentl.io
 * This is enumeration, that can be used inside other api calls, when needed.
 * https://docs.rentl.io/#enums-list-all-tourist-tax-categories
 */
class ListAllTouristTaxCategoriesRequest extends AbstractRequest
{
    public function __construct()
    {
        parent::__construct("GET", "/enums/guests/tax-categories");
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }
}