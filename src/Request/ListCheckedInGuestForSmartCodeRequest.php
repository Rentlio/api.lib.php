<?php

namespace Rentlio\Api\Request;

/**
 * Class ListCheckedInGuestForSmartCodeRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing checked in guests that has some smart card code and stays in property
 * https://docs.rentl.io/#guests-list-checked-in-guest-using-smartcard-get
 */
class ListCheckedInGuestForSmartCodeRequest extends AbstractRequest
{
    public function __construct($propertiesId, $smartCardCode)
    {
        parent::__construct("GET", "/smart-card/" . $propertiesId . "/" . $smartCardCode . "/guests/checked-in");
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }

    public function getSortAndPagingParams()
    {
        return [];
    }
}