<?php


class ListGuestsForReservationRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\ListGuestsForReservationRequest(1);
        $uri     = $request->getUri();

        $this->assertEquals('/reservations/1/guests', $uri->getPath());
        $this->assertEmpty($uri->getQuery());
    }
}