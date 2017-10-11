<?php

class ListAvailableUnitTypesRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\ListAvailableUnitTypesRequest(1);
        $uri     = $request->getUri();

        $this->assertEquals('/properties/1/unit-types/available', $uri->getPath());
        $this->assertEquals('order_by=id&order_direction=ASC&page=1&dateFrom&dateTo&rooms', $uri->getQuery());
    }

    public function testRequestSortChangedUri()
    {
        $request = new \Rentlio\Api\Request\ListAvailableUnitTypesRequest(1);
        $request->setSortOrder('DESC');
        $request->setSortBy('name');
        $request->setDateTo('2017-12-23');
        $request->setDateFrom('2017-12-13');
        $request->setRooms(2);
        $uri     = $request->getUri();

        $this->assertEquals('/properties/1/unit-types/available', $uri->getPath());
        $this->assertEquals('order_by=name&order_direction=DESC&page=1' .
            '&dateFrom=2017-12-13&dateTo=2017-12-23&rooms=2', $uri->getQuery());
    }
}