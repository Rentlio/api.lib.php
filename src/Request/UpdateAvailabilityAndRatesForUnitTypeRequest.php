<?php

namespace Rentlio\Api\Request;

use Rentlio\Api\Request\Data\AvailabilityAndRatesUpdate;

class UpdateAvailabilityAndRatesForUnitTypeRequest extends AbstractRequest
{
    protected $updates = [];

    public function __construct($id)
    {
        parent::__construct("POST", "/unit-types/" . $id . "/availrates");
    }

    public function addUpdate(AvailabilityAndRatesUpdate $update)
    {
        $this->updates[] = $update;
        return $this;
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

    public function jsonSerialize()
    {
        return ['days' => $this->updates];
    }
}