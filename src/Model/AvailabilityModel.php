<?php

namespace Rentlio\Api\Model;

class AvailabilityModel
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
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setMinStay($minStay)
    {
        $this->minStay = $minStay;
    }

    public function getArray()
    {
        $data = array(
            'date' => $this->date,
            'availability' => $this->availability,
            'price' => $this->price,
            'minStay' => $this->minStay
        );
        $data = array_filter($data, function($var){ return $var !== null;});
        return $data;
    }
}