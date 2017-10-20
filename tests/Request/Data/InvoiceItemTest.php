<?php

class InvoiceItemTest extends PHPUnit_Framework_TestCase
{
    public function testJsonSerialize()
    {
        $item = new \Rentlio\Api\Request\Data\InvoiceItem("Cola", 125, 1);

        $data = $item->jsonSerialize();
        $this->assertArrayNotHasKey('vatIncluded', $data);

        $item->setVatIncluded(true);
        $data = $item->jsonSerialize();
        $this->assertArrayHasKey('vatIncluded', $data);
    }
}