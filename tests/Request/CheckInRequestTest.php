<?php


class CheckInRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\CheckInRequest(1, true);
        $uri     = $request->getUri();

        $this->assertEquals('/reservations/1/checkin', $uri->getPath());

        $requestBody = json_encode($request);

        $this->assertJson($requestBody);
        $this->assertEquals('{"checkIn":true}', $requestBody);
    }
}