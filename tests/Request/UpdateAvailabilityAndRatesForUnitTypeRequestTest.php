<?php

class UpdateAvailabilityAndRatesForUnitTypeRequestTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\UpdateAvailabilityAndRatesForUnitTypeRequest(1);
        $uri     = $request->getUri();

        $this->assertEquals('/unit-types/1/availrates', $uri->getPath());
        $this->assertEquals('', $uri->getQuery());
    }

    public function testRequestSortChangedUri()
    {
        $request = new \Rentlio\Api\Request\UpdateAvailabilityAndRatesForUnitTypeRequest(1);
        $request
            ->setSortOrder('DESC')
            ->setSortBy('name');
        $uri = $request->getUri();

        $this->assertEquals('/unit-types/1/availrates', $uri->getPath());
        $this->assertEquals('', $uri->getQuery());
    }

    public function testJsonSerialize()
    {
        $request = new \Rentlio\Api\Request\UpdateAvailabilityAndRatesForUnitTypeRequest(1);
        $update  = new \Rentlio\Api\Request\Data\AvailabilityAndRatesUpdate("2016-10-01");
        $update->setPrice(110);
        $request->addUpdate($update);

        $requestBody = json_encode($request);

        $this->assertJson($requestBody);
        $this->assertEquals('{"days":[{"date":"2016-10-01","price":110}]}', $requestBody);
    }
}