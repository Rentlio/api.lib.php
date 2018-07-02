<?php


class CheckOutRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\CheckOutRequest(1);
        $uri     = $request->getUri();

        $this->assertEquals('/reservations/1/checkout', $uri->getPath());
    }
}