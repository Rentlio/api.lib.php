<?php

namespace Rentlio\Api\Request;

class ListUnitTypeAvailabilityRequest extends AbstractRequest
{
    protected $dateFrom;
    protected $dateTo;

    public function __construct($id)
    {
        parent::__construct("GET", "/unit-types/" . $id . "/availability");
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
            'dateFrom' => $this->dateFrom,
            'dateTo'   => $this->dateTo
        ];
    }
}