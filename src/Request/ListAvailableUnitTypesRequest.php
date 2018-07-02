<?php

namespace Rentlio\Api\Request;

/**
 * Class ListAvailableUnitTypesRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing all available unit types in some date range for
 * specified property (hotel)
 * https://docs.rentl.io/#unit-types-list-available-unit-types
 */
class ListAvailableUnitTypesRequest extends AbstractRequest
{
    /**
     * @var string ISO 8601 Date format
     */
    protected $dateFrom;

    /**
     * @var string ISO 8601 Date format
     */
    protected $dateTo;

    /**
     * @var int Minimum number of rooms that should be available to list this unit type.
     */
    protected $rooms;

    public function __construct($id)
    {
        parent::__construct("GET", "/properties/" . $id . "/unit-types/available");
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

    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
        return $this;
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [
            'dateFrom' => $this->dateFrom,
            'dateTo'   => $this->dateTo,
            'rooms'    => $this->rooms
        ];
    }
}