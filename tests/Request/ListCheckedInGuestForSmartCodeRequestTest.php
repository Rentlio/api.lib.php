<?php

class ListCheckedInGuestForSmartCodeRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\ListCheckedInGuestForSmartCodeRequest(95, "smart01");
        $uri     = $request->getUri();

        $this->assertEquals('/smart-card/95/smart01/guests/checked-in', $uri->getPath());
        $this->assertEquals('', $uri->getQuery());
    }
}