<?php

namespace Rentlio\Api\Request;

/**
 * Class GetInvoiceDetailsRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for that will provide data about the invoice with its related taxes and items.
 * https://docs.rentl.io/#invoices-get-invoice-details
 */
class GetInvoiceDetailsRequest extends AbstractRequest
{
    public function __construct($id)
    {
        parent::__construct("GET", "/invoices/" . $id);
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }
}