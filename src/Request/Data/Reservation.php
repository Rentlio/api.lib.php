<?php

namespace Rentlio\Api\Request\Data;

/**
 * Class Reservation
 * @package Rentlio\Api\Request\Data
 *
 * Reservation represents data for creating new reservations in Rentlio
 */
class Reservation implements \JsonSerializable
{
    /**
     * @var integer
     */
    protected $unitTypeId;

    /**
     * @var string ISO 8601 Date format
     */
    protected $dateFrom;

    /**
     * @var string ISO 8601 Date format
     */
    protected $dateTo;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $fullName;

    /**
     * @var integer
     */
    protected $persons;

    /**
     * @var integer
     */
    protected $rooms;

    /**
     * @var string
     */
    protected $note;

    /**
     * @var string
     */
    protected $cardHolder;

    /**
     * @var string
     */
    protected $cardNumber;

    /**
     * @var string
     */
    protected $expiryMonth;

    /**
     * @var string
     */
    protected $expiryYear;

    public function __construct($unitTypeId, $dateFrom, $dateTo, $rooms, $persons)
    {
        $this->unitTypeId = $unitTypeId;
        $this->dateFrom   = $dateFrom;
        $this->dateTo     = $dateTo;
        $this->rooms      = $rooms;
        $this->persons    = $persons;
    }

    /**
     * @param int $unitTypeId
     * @return Reservation
     */
    public function setUnitTypeId($unitTypeId)
    {
        $this->unitTypeId = $unitTypeId;
        return $this;
    }

    /**
     * @param string $dateFrom
     * @return Reservation
     */
    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    /**
     * @param string $dateTo
     * @return Reservation
     */
    public function setDateTo($dateTo)
    {
        $this->dateTo = $dateTo;
        return $this;
    }

    /**
     * @param string $email
     * @return Reservation
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string $fullName
     * @return Reservation
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @param int $persons
     * @return Reservation
     */
    public function setPersons($persons)
    {
        $this->persons = $persons;
        return $this;
    }

    /**
     * @param int $rooms
     * @return Reservation
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
        return $this;
    }

    /**
     * @param string $note
     * @return Reservation
     */
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @param string $cardHolder
     * @return Reservation
     */
    public function setCardHolder($cardHolder)
    {
        $this->cardHolder = $cardHolder;
        return $this;
    }

    /**
     * @param string $cardNumber
     * @return Reservation
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }

    /**
     * @param string $expiryMonth
     * @return Reservation
     */
    public function setExpiryMonth($expiryMonth)
    {
        $this->expiryMonth = $expiryMonth;
        return $this;
    }

    /**
     * @param string $expiryYear
     * @return Reservation
     */
    public function setExpiryYear($expiryYear)
    {
        $this->expiryYear = $expiryYear;
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
            'unitTypeId'  => $this->unitTypeId,
            'dateFrom'    => $this->dateFrom,
            'dateTo'      => $this->dateTo,
            'email'       => $this->email,
            'fullName'    => $this->fullName,
            'persons'     => $this->persons,
            'rooms'       => $this->rooms,
            'note'        => $this->note,
            'cardHolder'  => $this->cardHolder,
            'cardNumber'  => $this->cardNumber,
            'expiryMonth' => $this->expiryMonth,
            'expiryYear'  => $this->expiryYear,
        ];
        $data = array_filter($data, function ($var) {
            return $var !== null;
        });
        return $data;
    }
}