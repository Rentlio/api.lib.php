<?php

namespace Rentlio\Api\Request\Data;

/**
 * Class CheckIn
 * @package Rentlio\Api\Request\Data
 *
 * CheckOut represents data structure for checking in reservation.
 */
class CheckIn implements \JsonSerializable
{
    /**
     * @var bool
     */
    protected $checkIn;

    public function __construct($checkIn = true)
    {
        $this->checkIn = $checkIn;
    }

    /**
     * @param bool $checkIn
     */
    public function setCheckIn($checkIn)
    {
        $this->checkIn = $checkIn;
    }

    public function jsonSerialize()
    {
        return [
            'checkIn' => $this->checkIn,
        ];
    }
} 