<?php

namespace Rentlio\Api\Request;

class ListAvailableUnitTypesRequest extends AbstractRequest
{
    protected $id;
    protected $dateFrom;
    protected $dateTo;
    protected $rooms;

    public function __construct($id, array $headers = [], $body = null, $version = '1.1')
    {
        parent::__construct("GET", "/properties/" . $id . "/unit-types/available", $headers, $body, $version);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
    }

    public function setDateTo($dateTo)
    {
        $this->dateTo = $dateTo;
    }

    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [
            'dateFrom' => $this->dateFrom,
            'dateTo' => $this->dateTo,
            'rooms' => $this->rooms
        ];
    }
}