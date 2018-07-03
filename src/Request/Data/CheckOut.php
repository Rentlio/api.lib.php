<?php

namespace Rentlio\Api\Request\Data;

/**
 * Class CheckOut
 * @package Rentlio\Api\Request\Data
 *
 * CheckOut represents data structure for checking out reservation.
 */
class CheckOut implements \JsonSerializable
{
    /**
     * @var bool
     */
    protected $checkOut;

    public function __construct($checkOut = true)
    {
        $this->checkOut = $checkOut;
    }

    /**
     * @param bool $checkOut
     */
    public function setCheckOut($checkOut)
    {
        $this->checkOut = $checkOut;
    }

    public function jsonSerialize()
    {
        return [
            'checkOut' => $this->checkOut,
        ];
    }
}