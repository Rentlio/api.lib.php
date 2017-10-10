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

    public function __construct(array $headers = [], $body = null, $version = '1.1')
    {
        parent::__construct("GET", "/reservations", $headers, $body, $version);
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setUnitsId($unitsId)
    {
        $this->unitsId = $unitsId;
    }

    public function setPropertiesId($propertiesId)
    {
        $this->propertiesId = $propertiesId;
    }

    public function setBookedAtFrom($bookedAtFrom)
    {
        $this->bookedAtFrom = $bookedAtFrom;
    }

    public function setBookedAtTo($bookedAtTo)
    {
        $this->bookedAtTo = $bookedAtTo;
    }

    public function setCancelAtFrom($cancelAtFrom)
    {
        $this->cancelAtFrom = $cancelAtFrom;
    }

    public function setCancelAtTo($cancelAtTo)
    {
        $this->cancelAtTo = $cancelAtTo;
    }

    public function setCreatedAtFrom($createdAtFrom)
    {
        $this->createdAtFrom = $createdAtFrom;
    }

    public function setCreatedAtTo($createdAtTo)
    {
        $this->createdAtTo = $createdAtTo;
    }

    public function setModifiedAtFrom($modifiedAtFrom)
    {
        $this->modifiedAtFrom = $modifiedAtFrom;
    }

    public function setModifiedAtTo($modifiedAtTo)
    {
        $this->modifiedAtTo = $modifiedAtTo;
    }

    /**
    * @return array
    */
    public function getQueryParams()
    {
        return [
            'status' => $this->status,
            'unitsId' => $this->unitsId,
            'propertiesId' => $this->propertiesId,
            'bookedAtFrom' => $this->bookedAtFrom,
            'bookedAtTo' => $this->bookedAtTo,
            'cancelAtFrom' => $this->cancelAtFrom,
            'cancelAtTo' => $this->cancelAtTo,
            'createdAtFrom' => $this->createdAtFrom,
            'createdAtTo' => $this->createdAtTo,
            'modifiedAtFrom' => $this->modifiedAtFrom,
            'modifiedAtTo' => $this->modifiedAtTo
        ];
    }
}
?>