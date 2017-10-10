<?php


class ClientTest extends PHPUnit_Framework_TestCase
{
    public function testIsThereAnySyntaxError()
    {
        $var = new Rentlio\Api\Client("some api key");
        $this->assertTrue(is_object($var));
    }

    public function testSetBaseUrl()
    {
        $client = new Rentlio\Api\Client("some api key");
        $this->assertTrue(is_object($client->setBaseUrl("https://api.rentl.io/v2")));
    }

    public function testGetMyData()
    {
        $client   = new Rentlio\Api\Client("6d7b0cbb83174b188d579ad9a2182805");
        //$request  = new Rentlio\Api\Request\GetMyDataRequest();
        //$response = $client->send($request);
        //var_dump(json_decode($response->getBody()->getContents()));

        //$request = new Rentlio\Api\Request\ListAllPropertiesRequest();
        //$request->setSortOrder('ASC');
        //$response = $client->send($request);
        //var_dump(json_decode($response->getBody()->getContents()));

        $request  = new Rentlio\Api\Request\ListUnitTypeAvailabilityRequest(5797);
        $response = $client->send($request);
        var_dump(json_decode($response->getBody()->getContents()));
    }
}