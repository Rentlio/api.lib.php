<?php

namespace Rentlio\Api\Request;

/**
 * Class ListAllCheckedInGuestsRequest
 * @package Rentlio\Api\Request
 * GET Request for listing reservations with reservation holders that are checked-In at property in some date range
 */
class ListAllCheckedInGuestsRequest extends AbstractRequest
{

    /**
     * @var string ISO 8601 Date format
     */
    protected $dateFrom;

    /**
     * @var string ISO 8601 Date format
     */
    protected $dateTo;

    public function __construct($id)
    {
        parent::__construct("GET", "/properties/" . $id . "/guests/checked-in");
    }

    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    public function setDateTo($dateTo)
    {
        $this->dateTo = $dateTo;
        return $this;
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [
            'from' => $this->dateFrom,
            'to'   => $this->dateTo,
        ];
    }
}