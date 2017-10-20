<?php

class ListAllPropertiesRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\ListAllPropertiesRequest();
        $uri     = $request->getUri();

        $this->assertEquals('/properties', $uri->getPath());
        $this->assertEquals('order_by=id&order_direction=ASC&page=1', $uri->getQuery());
    }

    public function testRequestSortChangedUri()
    {
        $request = new \Rentlio\Api\Request\ListAllPropertiesRequest();

        $request->setName('Moji Apartmani')
            ->setSortOrder('DESC')
            ->setSortBy('name');

        $uri = $request->getUri();

        $this->assertEquals('/properties', $uri->getPath());
        $this->assertEquals('order_by=name&order_direction=DESC&page=1&name=Moji%20Apartmani', $uri->getQuery());
    }
}