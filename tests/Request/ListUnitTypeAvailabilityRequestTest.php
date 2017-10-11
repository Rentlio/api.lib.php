<?php


class ListUnitTypeAvailabilityRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\ListUnitTypeAvailabilityRequest(1);
        $uri     = $request->getUri();

        $this->assertEquals('/properties/1/unit-types', $uri->getPath());
        $this->assertEquals('order_by=id&order_direction=ASC&page=1&dateFrom&dateTo', $uri->getQuery());
    }

    public function testRequestSortChangedUri()
    {
        $request = new \Rentlio\Api\Request\ListUnitTypeAvailabilityRequest(1);
        $request->setSortOrder('DESC');
        $request->setSortBy('name');
        $request->setDateFrom('2017-11-12');
        $request->setDateTo('2017-11-22');
        $uri     = $request->getUri();

        $this->assertEquals('/properties/1/unit-types', $uri->getPath());
        $this->assertEquals('order_by=name&order_direction=DESC&page=1&dateFrom=2017-11-12&dateTo=2017-11-22',
                            $uri->getQuery());
    }

}