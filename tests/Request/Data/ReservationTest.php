<?php

class ReservationTest extends PHPUnit_Framework_TestCase
{
    public function testJsonSerialize()
    {
        $reservation = new \Rentlio\Api\Request\Data\Reservation(1, (new \DateTime())->modify('+1 day')->getTimestamp(), (new \DateTime())->modify('+5 day')->getTimestamp(), 1, 2);
        $data        = $reservation->jsonSerialize();

        $this->assertArrayHasKey('unitTypeId', $data);
        $this->assertArrayHasKey('dateFrom', $data);
        $this->assertArrayHasKey('dateTo', $data);
        $this->assertArrayNotHasKey('cardHolder', $data);
        $this->assertArrayNotHasKey('email', $data);
        $this->assertArrayNotHasKey('note', $data);

        $reservation->setRooms(5);
        $reservation->setEmail('doe@rentl.io');
        $reservation->setNote('Test reservation data');
        $reservation->setCardHolder('John Doe');
        $reservation->setExpiryYear(2020);

        $data = $reservation->jsonSerialize();
        $this->assertArrayHasKey('rooms', $data);
        $this->assertArrayHasKey('email', $data);
        $this->assertArrayHasKey('note', $data);
        $this->assertArrayHasKey('cardHolder', $data);
        $this->assertArrayHasKey('expiryYear', $data);

        $this->assertEquals('doe@rentl.io', $data['email']);
        $this->assertEquals('Test reservation data', $data['note']);
        $this->assertEquals(5, $data['rooms']);
        $this->assertEquals('John Doe', $data['cardHolder']);
        $this->assertEquals(2020, $data['expiryYear']);
    }
}