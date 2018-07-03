<?php

namespace Rentlio\Api\Request;

use Rentlio\Api\Request\Data\InvoiceItem;

/**
 * Class CreateInvoiceItemForReservationInBulkRequest
 * @package Rentlio\Api\Request
 *
 * POST Request for adding invoice items to reservation invoice.
 * If there are no invoices for this reservation in draft status, new invoice will be created.
 * https://docs.rentl.io/#invoices-create-invoice-items-for-reservation-in-bulk
 */
class CreateInvoiceItemForReservationInBulkRequest extends AbstractRequest
{
    /**
     * @var array
     */
    protected $invoiceItems = [];

    /**
     * @var InvoiceItem
     */
    protected $invoiceItem;

    public function __construct($id, array $items = null)
    {
        parent::__construct("POST", "/reservations/" . $id . "/invoices/items/bulk");
        $this->invoiceItems = $items;
    }

    /**
     * @param array $items
     * @return $this
     */
    public function setInvoiceItems(array $items)
    {
        $this->invoiceItems = $items;
        return $this;
    }

    /**
     * @param InvoiceItem $item
     * @return $this
     */
    public function addInvoiceItem(InvoiceItem $item)
    {
        $this->invoiceItems[] = $item;
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
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->invoiceItems;
    }
}