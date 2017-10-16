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
        $client   = new Rentlio\Api\Client("2464ae701955457d8842da34ba166416");
        //$request  = new Rentlio\Api\Request\GetMyDataRequest();
        //$response = $client->send($request);
        //var_dump(json_decode($response->getBody()->getContents()));

//        $request = new Rentlio\Api\Request\ListAllPropertiesRequest();
//        $request->setSortOrder('ASC');
//        $response = $client->send($request);
//        var_dump(json_decode($response->getBody()->getContents()));

//        $request  = new Rentlio\Api\Request\ListUnitTypeAvailabilityRequest(4868);
//        $response = $client->send($request);
//        var_dump(json_decode($response->getBody()->getContents()));

//        $request = new Rentlio\Api\Request\ListUnitTypeRatesRequest(8805);
//        $response = $client->send($request);
//        var_dump(json_decode($response->getBody()->getContents()));

//        $request = new Rentlio\Api\Request\ListAvailableUnitTypesRequest(4868);
//        $request->setDateFrom("2017-09-17");
//        $request->setDateTo("2017-09-19");
//        $response = $client->send($request);
//        var_dump(json_decode($response->getBody()->getContents()));

//        $request  = new Rentlio\Api\Request\ListAllUnitsRequest(4868);
//        $response = $client->send($request);
//        var_dump(json_decode($response->getBody()->getContents()));

//        $request  = new Rentlio\Api\Request\ListAllReservationsTodayForAUnitRequest(19999);
//        $response = $client->send($request);
//        var_dump(json_decode($response->getBody()->getContents()));

//        $request  = new Rentlio\Api\Request\ListAllServicesForPropertyRequest(4868);
//        $response = $client->send($request);
//        var_dump(json_decode($response->getBody()->getContents()));

//        $request  = new Rentlio\Api\Request\ListAllServicesPaymentTypesRequest();
//        $response = $client->send($request);
//        var_dump(json_decode($response->getBody()->getContents()));

//        $request  = new Rentlio\Api\Request\ListAllCurrenciesRequest();
//        $response = $client->send($request);
//        var_dump(json_decode($response->getBody()->getContents()));

//        $request  = new Rentlio\Api\Request\UpdateAvailabilityAndRatesForUnitTypeRequest(8805);
//
//        $item = new Rentlio\Api\Model\AvailabilityModel("2017-10-15");
//        $item->setPrice(15);
//        $item->setAvailability(1);
//        $request->addUpdate($item);
//
//        $item = new Rentlio\Api\Model\AvailabilityModel("2017-10-16");
//        $item->setPrice(16);
//        $item->setAvailability(2);
//        $request->addUpdate($item);
//
//        $response = $client->send($request);
//        var_dump(json_decode($response->getBody()->getContents()));


        $request = new Rentlio\Api\Request\CreateInvoiceItemForReservationRequest(944711);

        $item = new Rentlio\Api\Model\InvoiceModel("Coca cola", 100, 1, "PDV", 25);
        $item->setDiscountPercent(10);
        $request->addUpdate($item);

        $response = $client->send($request);
        var_dump(json_decode($response->getBody()->getContents()));
    }
}