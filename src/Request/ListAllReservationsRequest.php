<?php

namespace Rentlio\Api\Request;

/**
 * Class ListAllReservationsRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing all reservations. There are many query params that can
 * be used with this endpoint to filter this reservations out.
 */
class ListAllReservationsRequest extends AbstractRequest
{
    /**
     * @var int
     */
    protected $status;

    /**
     * @var int
     */
    protected $unitsId;

    /**
     * @var int
     */
    protected $propertiesId;

    /**
     * @var string ISO 8601 Date format
     */
    protected $bookedAtFrom;

    /**
     * @var string ISO 8601 Date format
     */
    protected $bookedAtTo;

    /**
     * @var string ISO 8601 Date format
     */
    protected $cancelAtFrom;

    /**
     * @var string ISO 8601 Date format
     */
    protected $cancelAtTo;

    /**
     * @var string ISO 8601 Date format
     */
    protected $createdAtFrom;

    /**
     * @var string ISO 8601 Date format
     */
    protected $createdAtTo;

    /**
     * @var string ISO 8601 Date format
     */
    protected $modifiedAtFrom;

    /**
     * @var string ISO 8601 Date format
     */
    protected $modifiedAtTo;

    public function __construct()
    {
        parent::__construct("GET", "/reservations");
    }

    /**
     * @param $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param $unitsId
     * @return $this
     */
    public function setUnitsId($unitsId)
    {
        $this->unitsId = $unitsId;
        return $this;
    }

    /**
     * @param $propertiesId
     * @return $this
     */
    public function setPropertiesId($propertiesId)
    {
        $this->propertiesId = $propertiesId;
        return $this;
    }

    /**
     * @param $bookedAtFrom
     * @return $this
     */
    public function setBookedAtFrom($bookedAtFrom)
    {
        $this->bookedAtFrom = $bookedAtFrom;
        return $this;
    }

    /**
     * @param $bookedAtTo
     * @return $this
     */
    public function setBookedAtTo($bookedAtTo)
    {
        $this->bookedAtTo = $bookedAtTo;
        return $this;
    }

    /**
     * @param $cancelAtFrom
     * @return $this
     */
    public function setCancelAtFrom($cancelAtFrom)
    {
        $this->cancelAtFrom = $cancelAtFrom;
        return $this;
    }

    /**
     * @param $cancelAtTo
     * @return $this
     */
    public function setCancelAtTo($cancelAtTo)
    {
        $this->cancelAtTo = $cancelAtTo;
        return $this;
    }

    /**
     * @param $createdAtFrom
     * @return $this
     */
    public function setCreatedAtFrom($createdAtFrom)
    {
        $this->createdAtFrom = $createdAtFrom;
        return $this;
    }

    /**
     * @param $createdAtTo
     * @return $this
     */
    public function setCreatedAtTo($createdAtTo)
    {
        $this->createdAtTo = $createdAtTo;
        return $this;
    }

    /**
     * @param $modifiedAtFrom
     * @return $this
     */
    public function setModifiedAtFrom($modifiedAtFrom)
    {
        $this->modifiedAtFrom = $modifiedAtFrom;
        return $this;
    }

    /**
     * @param $modifiedAtTo
     * @return $this
     */
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