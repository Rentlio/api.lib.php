<?php

namespace Rentlio\Api\Request\Data;

/**
 * Class InvoiceItem
 * @package Rentlio\Api\Request\Data
 *
 * InvoiceItem represents data for single Invoice item that will be added to reservation invoice.
 * If reservation doesn't have any draft invoices, new invoice will be created and
 * this item added to it.
 */
class InvoiceItem implements \JsonSerializable
{
    /**
     * @var string
     */
    protected $description;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var string Y|N
     */
    protected $vatIncluded;

    /**
     * @var float
     */
    protected $quantity;

    /**
     * @var float
     */
    protected $discountPercent;

    /**
     * @var array
     */
    protected $taxes = [];

    public function __construct($description, $price, $quantity)
    {
        $this->description = $description;
        $this->price       = $price;
        $this->quantity    = $quantity;
    }

    public function addTax($label, $rate)
    {
        if (count($this->taxes) < 2) {
            $this->taxes[] = [
                'label' => $label,
                'rate'  => $rate
            ];
        }
        return $this;
    }

    /**
     * Add new tax with PDV label. This is specific for Croatian market
     *
     * @param $rate
     * @return $this
     */
    public function addPDVTax($rate)
    {
        $this->taxes[] = [
            'label' => 'PDV',
            'rate'  => $rate
        ];
        return $this;
    }

    /**
     * Add new tax with PNP label. This is specific for Croatian market
     *
     * @param $rate
     * @return $this
     */
    public function addPNPTax($rate)
    {
        $this->taxes[] = [
            'label' => 'PNP',
            'rate'  => $rate
        ];
        return $this;
    }

    public function setVatIncluded($vatIncluded)
    {
        $this->vatIncluded = $vatIncluded;
        return $this;
    }

    public function setDiscountPercent($discountPercent)
    {
        $this->discountPercent = $discountPercent;
        return $this;
    }

    /**
     * Form data for request body.
     * If some of fields are null this fields will not be included in json
     *
     * @return array
     */
    public function jsonSerialize()
    {
        $data = [
            'description'     => $this->description,
            'price'           => $this->price,
            'vatIncluded'     => $this->vatIncluded,
            'quantity'        => $this->quantity,
            'discountPercent' => $this->discountPercent,
            'taxes'           => $this->taxes
        ];

        $data = array_filter($data, function ($var) {
            return $var !== null;
        });
        return $data;
    }
}