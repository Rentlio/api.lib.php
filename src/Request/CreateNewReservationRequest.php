<?php

namespace Rentlio\Api\Request;

use Rentlio\Api\Request\Data\Reservation;

/**
 * Class CreateNewReservationRequest
 * @package Rentlio\Api\Request
 *
 * POST Request for creating new reservation.
 * https://docs.rentl.io/#invoices-create-invoice-item-for-reservation
 */
class CreateNewReservationRequest extends AbstractRequest
{
    /**
     * @var Reservation
     */
    protected $reservation;

    public function __construct(Reservation $reservation = null)
    {
        parent::__construct("POST", "/reservations");
        $this->reservation = $reservation;
    }

    /**
     * @param Reservation $reservation
     * @return $this
     */
    public function setReservation(Reservation $reservation)
    {
        $this->reservation = $reservation;
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
     * @return Reservation
     */
    public function jsonSerialize()
    {
        return $this->reservation;
    }
}