<?php

namespace Rentlio\Api\Request;

use Rentlio\Api\Request\Data\AvailabilityAndRatesUpdate;

/**
 * Class UpdateAvailabilityAndRatesForUnitTypeRequest
 * @package Rentlio\Api\Request
 *
 * POST Request for updating availability, prices and minStay
 * for some unit type on specific dates.
 * https://docs.rentl.io/#unit-types-update-availability-and-rates-for-unit-type
 */
class UpdateAvailabilityAndRatesForUnitTypeRequest extends AbstractRequest
{
    /**
     * @var array AvailabilityAndRatesUpdate
     */
    protected $updates = [];

    public function __construct($id)
    {
        parent::__construct("POST", "/unit-types/" . $id . "/availrates");
    }

    /**
     * @param AvailabilityAndRatesUpdate $update
     * @return $this
     */
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

    /**
     * @return array
     */
    public function getSortAndPagingParams()
    {
        return [];
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return ['days' => $this->updates];
    }
}