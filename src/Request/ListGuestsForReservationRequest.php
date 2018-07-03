<?php

namespace Rentlio\Api\Request;

/**
 * Class ListGuestsForReservationRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing guests on the reservation.
 * That means that it will return the reservation holder and the list of the additional guests.
 * https://docs.rentl.io/#guests-list-guests-for-the-reservation
 */
class ListGuestsForReservationRequest extends AbstractRequest
{
    public function __construct($id)
    {
        parent::__construct("GET", "/reservations/" . $id . "/guests");
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
}