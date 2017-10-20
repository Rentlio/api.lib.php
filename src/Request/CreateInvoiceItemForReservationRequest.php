<?php

namespace Rentlio\Api\Request;

use Rentlio\Api\Request\Data\InvoiceItem;

/**
 * Class CreateInvoiceItemForReservationRequest
 * @package Rentlio\Api\Request
 *
 * POST Request for adding new invoice item to reservation invoice.
 * If there are no invoices for this reservation in draft status, new invoice will be created.
 */
class CreateInvoiceItemForReservationRequest extends AbstractRequest
{
    /**
     * @var InvoiceItem
     */
    protected $invoiceItem;

    public function __construct($id, InvoiceItem $item = null)
    {
        parent::__construct("POST", "/reservations/" . $id . "/invoices/items");
        $this->invoiceItem = $item;
    }

    /**
     * @param InvoiceItem $item
     * @return $this
     */
    public function setInvoiceItem(InvoiceItem $item)
    {
        $this->invoiceItem = $item;
        return $this;
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }

    /**
     * @return array
     */
    public function getSortAndPagingParams()
    {
        return [];
    }

    /**
     * @return InvoiceItem
     */
    public function jsonSerialize()
    {
        return $this->invoiceItem;
    }
}