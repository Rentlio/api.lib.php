<?php

class CreateReservationRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\CreateNewReservationRequest();
        $uri     = $request->getUri();

        $this->assertEquals('/reservations', $uri->getPath());
        $this->assertEquals('', $uri->getQuery());
    }

    public function testJsonSerialize()
    {
        $request     = new \Rentlio\Api\Request\CreateNewReservationRequest();
        $requestBody = json_encode($request);
        $this->assertJson($requestBody);

        $reservation = new \Rentlio\Api\Request\Data\Reservation(1, '1530537657', '1530537659', 1, 2);
        $request->setReservation($reservation);

        $requestBody = json_encode($request);
        $this->assertJson($requestBody);
        $this->assertEquals('{"unitTypeId":1,"dateFrom":"1530537657","dateTo":"1530537659","persons":2,"rooms":1}', $requestBody);

        $reservation->setEmail('doe@rentl.io');
        $reservation->setNote('Testing request');
        $reservation->setRooms(2);
        $reservation->setPersons(3);
        $reservation->setExpiryYear(2022);
        $reservation->setCardHolder('John Doe');
        $reservation->setCardNumber('0987654321');
        $reservation->setExpiryMonth(8);

        $requestBody = json_encode($request);
        $this->assertJson($requestBody);
        $this->assertEquals('{"unitTypeId":1,"dateFrom":"1530537657","dateTo":"1530537659","email":"doe@rentl.io","persons":3,"rooms":2,"note":"Testing request","cardHolder":"John Doe","cardNumber":"0987654321","expiryMonth":8,"expiryYear":2022}', $requestBody);
    }
}