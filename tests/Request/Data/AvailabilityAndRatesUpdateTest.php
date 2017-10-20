<?php

class AvailabilityAndRatesUpdateTest extends PHPUnit_Framework_TestCase
{
    public function testJsonSerialize()
    {
        $update = new \Rentlio\Api\Request\Data\AvailabilityAndRatesUpdate("2016-10-01");
        $update->setPrice(125.55);

        $data = $update->jsonSerialize();
        $this->assertArrayNotHasKey('minStay', $data);

        $update->setMinStay(2);
        $data = $update->jsonSerialize();
        $this->assertArrayHasKey('minStay', $data);
    }
}