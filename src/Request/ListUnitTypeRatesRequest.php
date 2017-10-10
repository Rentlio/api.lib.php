<?php

namespace Rentlio\Api\Request;

class ListUnitTypeRatesRequest extends AbstractRequest
{
    protected $id;
    protected $dateFrom;
    protected $dateTo;

    public function __construct($id, array $headers = [], $body = null, $version = '1.1')
    {
        parent::__construct("GET", "/unit-types/" . $id . "/rates", $headers, $body, $version);
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

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [
            'dateFrom' => $this->dateFrom,
            'dateTo' => $this->dateTo
        ];
    }

}