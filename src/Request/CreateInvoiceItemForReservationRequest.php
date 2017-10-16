<?php

namespace Rentlio\Api\Request;

use Rentlio\Api\Model\InvoiceModel;

class CreateInvoiceItemForReservationRequest extends AbstractRequest
{
    protected $update;

    public function __construct($id, $body = null, array $headers = [], $version = '1.1')
    {
        parent::__construct("POST", "/reservations/" . $id . "/invoices/items", $headers, $body, $version);

    }

    public function addUpdate(InvoiceModel $model)
    {
        $this->update = $model->getArray();
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
        return [$this->update];
    }
}