<?php


class ListUnitTypeRatesRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\ListUnitTypeRatesRequest(1);
        $uri     = $request->getUri();

        $this->assertEquals('/unit-types/1/rates', $uri->getPath());
        $this->assertEquals('order_by=id&order_direction=ASC&page=1', $uri->getQuery());
    }

    public function testRequestSortChangedUri()
    {
        $request = new \Rentlio\Api\Request\ListUnitTypeRatesRequest(1);
        $request
            ->setSortOrder('DESC')
            ->setSortBy('name')
            ->setDateFrom('2017-11-12')
            ->setDateTo('2017-11-22');
        $uri = $request->getUri();

        $this->assertEquals('/unit-types/1/rates', $uri->getPath());
        $this->assertEquals(
            'order_by=name&order_direction=DESC&page=1&dateFrom=2017-11-12&dateTo=2017-11-22',
            $uri->getQuery()
        );
    }

}