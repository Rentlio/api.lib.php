<?php

namespace Rentlio\Api\Request\Data;

/**
 * Class AvailabilityAndRatesUpdate
 * @package Rentlio\Api\Request\Data
 *
 * AvailabilityAndRatesUpdate represents data for updating single day values
 * for availability, price and minStay restriction.
 * Only $date field + additional second filed is required.
 * For example ony availability can be updated if date and availability is set
 */
class AvailabilityAndRatesUpdate implements \JsonSerializable
{
    /**
     * @var string ISO 8601 Date format
     */
    protected $date;

    /**
     * @var integer
     */
    protected $availability;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var integer
     */
    protected $minStay;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function setAvailability($availability)
    {
        $this->availability = $availability;
        return $this;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function setMinStay($minStay)
    {
        $this->minStay = $minStay;
        return $this;
    }

    /**
     * Form data for request body.
     * If some of fields are null this fields will not be included in json
     *
     * @return array
     */
    public function jsonSerialize()
    {
        $data = [
            'date'         => $this->date,
            'availability' => $this->availability,
            'price'        => $this->price,
            'minStay'      => $this->minStay
        ];
        $data = array_filter($data, function ($var) {
            return $var !== null;
        });
        return $data;
    }
}