<?php


class GetInvoicesByReservationTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\GetInvoicesByReservationRequest(1);
        $uri     = $request->getUri();

        $this->assertEquals('/reservations/1/invoices', $uri->getPath());
        $this->assertEquals('order_by=id&order_direction=ASC&page=1', $uri->getQuery());
    }

    public function testRequestSortChangedUri()
    {
        $request = new \Rentlio\Api\Request\GetInvoicesByReservationRequest(1);
        $request
            ->setSortOrder('DESC')
            ->setSortBy('id');
        $uri = $request->getUri();

        $this->assertEquals('/reservations/1/invoices', $uri->getPath());
        $this->assertEquals('order_by=id&order_direction=DESC&page=1', $uri->getQuery());
    }

}