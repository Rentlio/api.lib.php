<?php

use Rentlio\Api\Request\Data\InvoiceItem;

class CreateInvoiceItemForSmartCardInBulkTest extends PHPUnit_Framework_TestCase
{
    public function testRequestDefaultUri()
    {
        $request = new \Rentlio\Api\Request\CreateInvoiceItemForSmartCardInBulk(10,"some-code-for-test");
        $uri     = $request->getUri();

        $this->assertEquals('/smart-card/10/some-code-for-test/invoices/items/bulk', $uri->getPath());
        $this->assertEquals('', $uri->getQuery());
    }

    public function testJsonSerialize()
    {
        $request = new \Rentlio\Api\Request\CreateInvoiceItemForSmartCardInBulk(10, "some-code-for-test");
        $item    = new InvoiceItem("Cola", 123.33, 0.5);

        $request->addInvoiceItem($item);

        $requestBody = json_encode($request);
        $this->assertJson($requestBody);
        $this->assertEquals('[{"description":"Cola","price":123.33,"quantity":0.5,"taxes":[]}]', $requestBody);

        $foodItem = new InvoiceItem('Angus Burger', 75.00, 2);
        $beerItem = new InvoiceItem('Pale Ale', 20.00, 1);
        $sodaItem = new InvoiceItem('Soda', 15.00, 0.3);

        $request->setInvoiceItems([$foodItem, $beerItem, $sodaItem]);
        $requestBody = json_encode($request);
        $this->assertJson($requestBody);
        $this->assertEquals('[{"description":"Angus Burger","price":75,"quantity":2,"taxes":[]},{"description":"Pale Ale","price":20,"quantity":1,"taxes":[]},{"description":"Soda","price":15,"quantity":0.3,"taxes":[]}]', $requestBody);

        $request->setInvoiceItems([]);
        $requestBody = json_encode($request);
        $this->assertJson($requestBody);
        $this->assertEquals('[]', $requestBody);

    }
}