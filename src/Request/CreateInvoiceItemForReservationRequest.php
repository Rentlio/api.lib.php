<?php

namespace Rentlio\Api\Request;

use Rentlio\Api\Request\Data\InvoiceItem;

class CreateInvoiceItemForReservationRequest extends AbstractRequest
{
    protected $invoiceItem;

    public function __construct($id, InvoiceItem $item = null)
    {
        parent::__construct("POST", "/reservations/" . $id . "/invoices/items");
        $this->invoiceItem = $item;
    }

    public function setInvoiceItem(InvoiceItem $item)
    {
        $this->invoiceItem = $item;
        return $this;
    }

    public function getQueryParams()
    {
        return [];
    }

    public function getSortAndPagingParams()
    {
        return [];
    }

    public function jsonSerialize()
    {
        return $this->invoiceItem;
    }
}