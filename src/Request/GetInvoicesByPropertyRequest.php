<?php

namespace Rentlio\Api\Request;

/**
 * Class GetInvoicesByProperty
 * @package Rentlio\Api\Request
 *
 * GET Request for listing invoices associated with property
 * https://docs.rentl.io/#invoices-get-invoices-by-property
 */
class GetInvoicesByPropertyRequest extends AbstractRequest
{
    public function __construct($id)
    {
        parent::__construct("GET", "/properties/" . $id . "/invoices");
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }
}