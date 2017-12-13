<?php

class ListAllCheckedInGuestsRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\ListAllCheckedInGuestsRequest(1);
        $uri     = $request->getUri();

        $this->assertEquals('/properties/1/guests/checked-in', $uri->getPath());
        $this->assertEquals('order_by=id&order_direction=ASC&page=1', $uri->getQuery());
    }

    public function testRequestSortChangedUri()
    {
        $request = new \Rentlio\Api\Request\ListAllCheckedInGuestsRequest(1);
        $request
            ->setSortOrder('DESC')
            ->setSortBy('name')
            ->setDateTo('2017-12-28')
            ->setDateFrom('2017-12-25');

        $uri = $request->getUri();

        $this->assertEquals('/properties/1/guests/checked-in', $uri->getPath());
        $this->assertEquals('order_by=name&order_direction=DESC&page=1' .
            '&from=2017-12-25&to=2017-12-28', $uri->getQuery());
    }
}