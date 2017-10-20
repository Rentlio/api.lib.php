<?php

namespace Rentlio\Api\Request;

class ListAllReservationsRequest extends AbstractRequest
{
    protected $status;
    protected $unitsId;
    protected $propertiesId;
    protected $bookedAtFrom;
    protected $bookedAtTo;
    protected $cancelAtFrom;
    protected $cancelAtTo;
    protected $createdAtFrom;
    protected $createdAtTo;
    protected $modifiedAtFrom;
    protected $modifiedAtTo;

    public function __construct()
    {
        parent::__construct("GET", "/reservations");
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function setUnitsId($unitsId)
    {
        $this->unitsId = $unitsId;
        return $this;
    }

    public function setPropertiesId($propertiesId)
    {
        $this->propertiesId = $propertiesId;
        return $this;
    }

    public function setBookedAtFrom($bookedAtFrom)
    {
        $this->bookedAtFrom = $bookedAtFrom;
        return $this;
    }

    public function setBookedAtTo($bookedAtTo)
    {
        $this->bookedAtTo = $bookedAtTo;
        return $this;
    }

    public function setCancelAtFrom($cancelAtFrom)
    {
        $this->cancelAtFrom = $cancelAtFrom;
        return $this;
    }

    public function setCancelAtTo($cancelAtTo)
    {
        $this->cancelAtTo = $cancelAtTo;
        return $this;
    }

    public function setCreatedAtFrom($createdAtFrom)
    {
        $this->createdAtFrom = $createdAtFrom;
        return $this;
    }

    public function setCreatedAtTo($createdAtTo)
    {
        $this->createdAtTo = $createdAtTo;
        return $this;
    }

    public function setModifiedAtFrom($modifiedAtFrom)
    {
        $this->modifiedAtFrom = $modifiedAtFrom;
        return $this;
    }

    public function setModifiedAtTo($modifiedAtTo)
    {
        $this->modifiedAtTo = $modifiedAtTo;
        return $this;
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [
            'status'         => $this->status,
            'unitsId'        => $this->unitsId,
            'propertiesId'   => $this->propertiesId,
            'bookedAtFrom'   => $this->bookedAtFrom,
            'bookedAtTo'     => $this->bookedAtTo,
            'cancelAtFrom'   => $this->cancelAtFrom,
            'cancelAtTo'     => $this->cancelAtTo,
            'createdAtFrom'  => $this->createdAtFrom,
            'createdAtTo'    => $this->createdAtTo,
            'modifiedAtFrom' => $this->modifiedAtFrom,
            'modifiedAtTo'   => $this->modifiedAtTo
        ];
    }
}