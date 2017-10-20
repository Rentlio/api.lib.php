<?php


class ListAllReservationsRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\ListAllReservationsRequest();
        $uri     = $request->getUri();

        $this->assertEquals('/reservations', $uri->getPath());
        $this->assertEquals('order_by=id&order_direction=ASC&page=1&status&unitsId&' .
            'propertiesId&bookedAtFrom&bookedAtTo&cancelAtFrom&' .
            'cancelAtTo&createdAtFrom&createdAtTo&modifiedAtFrom&modifiedAtTo', $uri->getQuery());
    }

    public function testRequestSortChangedUri()
    {
        $request = new \Rentlio\Api\Request\ListAllReservationsRequest();
        $request
            ->setSortOrder('DESC')
            ->setSortBy('name')
            ->setStatus(1)
            ->setUnitsId('2345')
            ->setPropertiesId('1212')
            ->setBookedAtFrom('2017-12-13')
            ->setBookedAtTo('2017-12-23')
            ->setCancelAtFrom('2017-12-24')
            ->setCancelAtTo('2017-12-26')
            ->setCreatedAtFrom('2017-11-24')
            ->setCreatedAtTo('2017-11-30')
            ->setModifiedAtFrom('2017-12-29')
            ->setModifiedAtTo('2017-12-30');

        $uri = $request->getUri();

        $this->assertEquals('/reservations', $uri->getPath());
        $this->assertEquals('order_by=name&order_direction=DESC&page=1&status=1&unitsId=2345&' .
            'propertiesId=1212&bookedAtFrom=2017-12-13&bookedAtTo=2017-12-23&cancelAtFrom=2017-12-24&' .
            'cancelAtTo=2017-12-26&createdAtFrom=2017-11-24&createdAtTo=2017-11-30' .
            '&modifiedAtFrom=2017-12-29&modifiedAtTo=2017-12-30', $uri->getQuery());
    }

}