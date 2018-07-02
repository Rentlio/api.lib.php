<?php

namespace Rentlio\Api\Request;

/**
 * Class ListUnitTypeRatesRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing all unit type rates in some date range
 * https://docs.rentl.io/#unit-types-list-unit-type-restrictions
 */
class ListUnitTypeRestrictionsRequest extends AbstractRequest
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
        parent::__construct("GET", "/unit-types/" . $id . "/restrictions");
    }

    /**
     * @param $dateFrom
     * @return $this
     */
    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    /**
     * @param $dateTo
     * @return $this
     */
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
            'dateFrom' => $this->dateFrom,
            'dateTo'   => $this->dateTo
        ];
    }
}