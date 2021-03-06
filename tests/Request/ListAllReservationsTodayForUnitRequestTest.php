<?php

class ListAllReservationsTodayForUnitRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\ListAllReservationsTodayForUnitRequest(2);
        $uri     = $request->getUri();

        $this->assertEquals('/units/2/reservations/today', $uri->getPath());
        $this->assertEquals('order_by=id&order_direction=ASC&page=1', $uri->getQuery());
    }

    public function testRequestSortChangedUri()
    {
        $request = new \Rentlio\Api\Request\ListAllReservationsTodayForUnitRequest(1);
        $request
            ->setSortOrder('DESC')
            ->setSortBy('arrivalDate');
        $uri = $request->getUri();

        $this->assertEquals('/units/1/reservations/today', $uri->getPath());
        $this->assertEquals('order_by=arrivalDate&order_direction=DESC&page=1', $uri->getQuery());
    }
}