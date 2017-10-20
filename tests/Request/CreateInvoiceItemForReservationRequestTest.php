<?php

class CreateInvoiceItemForReservationRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\CreateInvoiceItemForReservationRequest(1);
        $uri     = $request->getUri();

        $this->assertEquals('/reservations/1/invoices/items', $uri->getPath());
        $this->assertEquals('', $uri->getQuery());
    }

    public function testRequestSortChangedUri()
    {
        $request = new \Rentlio\Api\Request\CreateInvoiceItemForReservationRequest(1);
        $request->setSortOrder('DESC');
        $request->setSortBy('name');
        $uri = $request->getUri();

        $this->assertEquals('/reservations/1/invoices/items', $uri->getPath());
        $this->assertEquals('',
            $uri->getQuery());
    }

    public function testJsonSerialize()
    {
        $request = new \Rentlio\Api\Request\CreateInvoiceItemForReservationRequest(1);
        $item  = new \Rentlio\Api\Request\Data\InvoiceItem("Cola", 123.33, 0.5);

        $request->setInvoiceItem($item);

        $requestBody = json_encode($request);

        $this->assertJson($requestBody);
        $this->assertEquals('{"description":"Cola","price":123.33,"quantity":0.5,"taxes":[]}', $requestBody);
    }
}