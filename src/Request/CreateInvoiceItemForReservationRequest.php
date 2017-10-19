<?php

namespace Rentlio\Api\Request;

use Rentlio\Api\Model\InvoiceModel;

class CreateInvoiceItemForReservationRequest extends AbstractRequest
{
    protected $update;

    public function __construct($id)
    {
        parent::__construct("POST", "/reservations/" . $id . "/invoices/items");

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
        return $this->update;
    }
}