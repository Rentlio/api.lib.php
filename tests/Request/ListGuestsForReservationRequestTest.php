<?php


class ListGuestsForReservationRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\ListGuestsForReservationRequest(1);
        $uri     = $request->getUri();

        $this->assertEquals('/reservations/1/guests', $uri->getPath());
        $this->assertEquals('order_by=id&order_direction=ASC&page=1', $uri->getQuery());
    }

    public function testRequestSortChangedUri()
    {
        $request = new \Rentlio\Api\Request\ListGuestsForReservationRequest(1);
        $request
            ->setSortOrder('DESC')
            ->setSortBy('name');
        $uri = $request->getUri();

        $this->assertEquals('/reservations/1/guests', $uri->getPath());
        $this->assertEquals('order_by=name&order_direction=DESC&page=1', $uri->getQuery());
    }

}