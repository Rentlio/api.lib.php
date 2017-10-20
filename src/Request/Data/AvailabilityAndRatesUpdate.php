<?php

namespace Rentlio\Api\Request\Data;

class AvailabilityAndRatesUpdate implements \JsonSerializable
{
    protected $date;
    protected $availability;
    protected $price;
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