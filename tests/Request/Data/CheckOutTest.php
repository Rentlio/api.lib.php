<?php

class CheckOutTest extends PHPUnit_Framework_TestCase
{
    public function testJsonSerialize()
    {
        $item = new \Rentlio\Api\Request\Data\CheckOut(true);

        $data = $item->jsonSerialize();
        $this->assertArrayHasKey('checkOut', $data);
        $this->assertEquals($data['checkOut'], true);

        $item->setCheckOut(false);
        $data = $item->jsonSerialize();
        $this->assertArrayHasKey('checkOut', $data);
        $this->assertEquals($data['checkOut'], false);
    }
}