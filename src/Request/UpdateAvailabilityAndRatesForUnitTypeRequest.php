<?php

namespace Rentlio\Api\Request;

use Rentlio\Api\Model\AvailabilityModel;

class UpdateAvailabilityAndRatesForUnitTypeRequest extends AbstractRequest
{
    protected $updates = [];

    public function __construct($id, $body = null, array $headers = [], $version = '1.1')
    {
        parent::__construct("POST", "/unit-types/" . $id . "/availrates", $headers, $body, $version);
    }

    public function addUpdate(AvailabilityModel $model)
    {
        $this->updates[] = $model->getArray();
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