<?php


class CheckOutRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\CheckOutRequest(1, false);
        $uri     = $request->getUri();

        $this->assertEquals('/reservations/1/checkout', $uri->getPath());

        $requestBody = json_encode($request);

        $this->assertJson($requestBody);
        $this->assertEquals('{"checkOut":false}', $requestBody);
    }
}