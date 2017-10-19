<?php

namespace Rentlio\Api\Request;

class ListUnitTypeAvailabilityRequest extends AbstractRequest
{
    protected $dateFrom;
    protected $dateTo;

    public function __construct($id)
    {
        parent::__construct("GET", "/properties/" . $id . "/unit-types");
    }

    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
    }

    public function setDateTo($dateTo)
    {
        $this->dateTo = $dateTo;
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