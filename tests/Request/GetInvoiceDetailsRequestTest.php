<?php


class GetInvoiceDetailsRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\GetInvoiceDetailsRequest(1);
        $uri     = $request->getUri();

        $this->assertEquals('/invoices/1', $uri->getPath());
    }
}