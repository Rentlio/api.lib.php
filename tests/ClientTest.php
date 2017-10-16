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

        $request = new Rentlio\Api\Request\CreateInvoiceItemForReservationRequest(937326);

        $item = new Rentlio\Api\Model\InvoiceModel("Coca cola", 100, 1);
        $item->setDiscountPercent(10);
        $item->addTax("PDV", 25);
        $item->setVatIncluded("N");
        $request->addUpdate($item);

        $response = $client->send($request);
        var_dump(json_decode($response->getBody()->getContents()));
    }
}