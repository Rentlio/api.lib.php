<?php


class CheckInRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\CheckInRequest(1);
        $uri     = $request->getUri();

        $this->assertEquals('/reservations/1/checkin', $uri->getPath());
    }
}