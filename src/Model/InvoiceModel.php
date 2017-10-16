<?php

namespace Rentlio\Api\Model;

class InvoiceModel
{
    protected $description;
    protected $price;
    protected $vatIncluded;
    protected $quantity;
    protected $discountPercent;
    protected $taxes = [];

    public function __construct($description, $price, $quantity)
    {
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function addTax($label, $rate)
    {
        if(count($this->taxes) < 2)
        {
            $this->taxes[] = array(
                'label' => $label,
                'rate' => $rate
            );
        }
    }

    public function setVatIncluded($vatIncluded)
    {
        $this->vatIncluded = $vatIncluded;
    }

    public function setDiscountPercent($discountPercent)
    {
        $this->discountPercent = $discountPercent;
    }

    public function getArray()
    {
        $data = array(
            'description' => $this->description,
            'price' => $this->price,
            'vatIncluded' => $this->vatIncluded,
            'quantity' => $this->quantity,
            'discountPercent' => $this->discountPercent,
            'taxes' => $this->taxes
        );

        $data = array_filter($data, function($var){ return $var !== null;});
        return $data;
    }
}