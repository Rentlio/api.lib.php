<?php


class ClientTest extends PHPUnit_Framework_TestCase
{

    public function testIsThereAnySyntaxError()
    {
        $var = new Rentlio\Api\Client("some api key");
        $this->assertTrue(is_object($var));
        unset($var);
    }

    public function testSetBaseUrl()
    {
        $client = new Rentlio\Api\Client("some api key");
        $this->assertTrue(is_object($client->setBaseUrl("https://api.rentl.io/v2")));
        unset($var);
    }

    public function testGetMyData()
    {
        $client = new \Rentlio\Api\Client("9922098e3f8248ae978cb4fe96c193f9");
        $request = new \Rentlio\Api\Request\GetMyDataRequest();
        $response = $client->send($request);
        var_dump(json_decode($response->getBody()->getContents()));
    }

}