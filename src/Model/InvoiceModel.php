<?php

namespace Rentlio\Api\Model;

class InvoiceModel
{
    protected $description;
    protected $price;
    protected $vatIncluded;
    protected $quantity;
    protected $discountPercent;
    protected $label;
    protected $rate;

    public function __construct($description, $price, $quantity, $label, $rate)
    {
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->label = $label;
        $this->rate = $rate;
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
            'taxes' => array(
                array(
                    'label' => $this->label,
                    'rate' => $this->rate
                )
            )
        );

        $data = array_filter($data, function($var){ return $var !== null;});
        return $data;
    }
}