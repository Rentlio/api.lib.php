<?php

namespace Rentlio\Api;

use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Uri;
use Rentlio\Api\Request\AbstractRequest;
use Rentlio\Api\Request\CheckOutRequest;
use Rentlio\Api\Request\CreateInvoiceItemForReservationRequest;
use Rentlio\Api\Request\Data\CheckOut;
use Rentlio\Api\Request\GetMyDataRequest;
use Rentlio\Api\Request\ListAllArrivalArrangementsRequest;
use Rentlio\Api\Request\ListAllCheckedInGuestsRequest;
use Rentlio\Api\Request\ListAllCurrenciesRequest;
use Rentlio\Api\Request\ListAllDocumentTypesRequest;
use Rentlio\Api\Request\ListAllPropertiesRequest;
use Rentlio\Api\Request\ListAllProvidedServiceTypesRequest;
use Rentlio\Api\Request\ListAllReservationsRequest;
use Rentlio\Api\Request\ListAllReservationStatusesRequest;
use Rentlio\Api\Request\ListAllReservationsTodayForUnitRequest;
use Rentlio\Api\Request\ListAllServicesForPropertyRequest;
use Rentlio\Api\Request\ListAllServicesPaymentTypesRequest;
use Rentlio\Api\Request\ListAllTouristTaxCategoriesRequest;
use Rentlio\Api\Request\ListAllUnitsRequest;
use Rentlio\Api\Request\ListAllUnitTypesRequest;
use Rentlio\Api\Request\ListAvailableUnitTypesRequest;
use Rentlio\Api\Request\ListUnitTypeAvailabilityRequest;
use Rentlio\Api\Request\ListUnitTypeRatesRequest;
use Rentlio\Api\Request\RequestInterface;
use Rentlio\Api\Request\UpdateAvailabilityAndRatesForUnitTypeRequest;

/**
 * Class Client
 * @package Rentlio\Api
 *
 * Client for public rentl.io api.
 * Api docs can be found @ https://docs.rentl.io
 *
 * Instructions on usage can be found inside README.md and unit tests.
 */
class Client
{
    /**
     * Base URL for rentl.io production API. Currently v1 version
     *
     * @var string
     */
    protected $baseApiUrl = 'https://api.rentl.io/v1';

    /**
     * Api key has to be sent in request header for Authentication and Authorization
     *
     * @var string
     */
    protected $apiKey;

    /**
     * GuzzleHttp client that is used as transport for sending http requests
     *
     * @var \GuzzleHttp\Client
     */
    protected $transport;

    /**
     * Request timeout in seconds.
     *
     * @var integer
     */
    protected $timeout = 10;


    /**
     * Client constructor.
     * @param $apiKey string
     */
    public function __construct($apiKey)
    {
        $this->apiKey    = $apiKey;
        $this->transport = new \GuzzleHttp\Client([
            'timeout'  => $this->timeout,
            'base_url' => $this->baseApiUrl,
            'curl'     => [
                CURLOPT_SSLVERSION     => CURL_SSLVERSION_TLSv1_2,
                CURLOPT_SSL_VERIFYPEER => false
            ]
        ]);
    }

    /**
     * Allow to change base url. Can be used for staging or test mock servers
     *
     * @param $baseUrl string
     * @return $this
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseApiUrl = $baseUrl;
        return $this;
    }

    /**
     * Change timeout for all rentl.io requests
     *
     * @param $timeout
     * @return $this
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * We allow you to change GuzzleHttp\Client with your own, if you would like to
     * tweak options of default one.
     *
     * @param \GuzzleHttp\Client $transport
     * @return $this
     */
    public function setTransport(\GuzzleHttp\Client $transport)
    {
        $this->transport = $transport;
        return $this;
    }

    /**
     * Send http request to rentl.io api
     *
     * @param RequestInterface $request
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function send(RequestInterface $request)
    {
        $uri = new Uri($this->baseApiUrl . $request->getUri());

        /**
         * @var $request AbstractRequest
         */
        $request = $request
            ->withUri($uri)
            ->withAddedHeader('apiKey', $this->apiKey);

        if ($request->jsonSerialize() != null) {
            $request = $request->withBody(Psr7\stream_for(json_encode($request->jsonSerialize())));
        }

        return $this->transport->send($request);
    }

    /**
     * Calls api endpoint for getting user data associated with provided api key
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getMyData()
    {
        $request = new GetMyDataRequest();
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting all rentl.io currencies enumeration
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listAllCurrencies()
    {
        $request = new ListAllCurrenciesRequest();
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting all properties (hotels) associated with provided api key
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listAllProperties()
    {
        $request = new ListAllPropertiesRequest();
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting all reservations with different filtering options
     * Since this request can take multiple query params for filtering reservations
     * complete request should be passed to this method. Filters can be set on request itself
     *
     * @param ListAllReservationsRequest $request
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listAllReservations(ListAllReservationsRequest $request)
    {
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting all rentl.io reservation statuses enumeration
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listAllReservationStatuses()
    {
        $request = new ListAllReservationStatusesRequest();
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting all checkedIn reservations today in a unit (room)
     *
     * @param $unitId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listAllReservationsTodayForUnit($unitId)
    {
        $request = new ListAllReservationsTodayForUnitRequest((int)$unitId);
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting all services for a property (hotel)
     *
     * @param $propertyId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listAllServicesForProperty($propertyId)
    {
        $request = new ListAllServicesForPropertyRequest($propertyId);
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting all payment types enumeration
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listAllServicesPaymentTypes()
    {
        $request = new ListAllServicesPaymentTypesRequest();
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting all units for specified propertyId
     *
     * @param $propertyId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listAllUnits($propertyId)
    {
        $request = new ListAllUnitsRequest($propertyId);
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting all unit types for specified propertyId
     *
     * @param $propertyId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listAllUnitTypes($propertyId)
    {
        $request = new ListAllUnitTypesRequest($propertyId);
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting all available unit types in date range
     * for specified propertyId
     *
     * @param $propertyId
     * @param \DateTime $dateFrom
     * @param \DateTime $dateTo
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listAvailableUnitTypes($propertyId, \DateTime $dateFrom, \DateTime $dateTo)
    {
        $request = new ListAvailableUnitTypesRequest($propertyId);
        $request->setDateFrom($dateFrom->format('Y-m-d'));
        $request->setDateTo($dateTo->format('Y-m-d'));
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting availability status for Unit Type in some date range
     *
     * @param $unitTypeId
     * @param \DateTime $dateFrom
     * @param \DateTime $dateTo
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listUnitTypeAvailability($unitTypeId, \DateTime $dateFrom, \DateTime $dateTo)
    {
        $request = new ListUnitTypeAvailabilityRequest($unitTypeId);
        $request->setDateFrom($dateFrom->format('Y-m-d'));
        $request->setDateTo($dateTo->format('Y-m-d'));
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting rates for Unit Type in some date range
     *
     * @param $unitTypeId
     * @param \DateTime $dateFrom
     * @param \DateTime $dateTo
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listUnitTypeRates($unitTypeId, \DateTime $dateFrom, \DateTime $dateTo)
    {
        $request = new ListUnitTypeRatesRequest($unitTypeId);
        $request->setDateFrom($dateFrom->format('Y-m-d'));
        $request->setDateTo($dateTo->format('Y-m-d'));
        return $this->send($request);
    }

    /**
     * Calls api endpoint for adding new invoice item to reservation invoice.
     * If there are no invoices for this reservation in draft status, new one will be created.
     *
     * @param CreateInvoiceItemForReservationRequest $request
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function createInvoiceItem(CreateInvoiceItemForReservationRequest $request)
    {
        return $this->send($request);
    }

    /**
     * Calls api endpoint for updating availability, price and minStay restriction
     * on specific days for specified unit type.
     *
     * @param UpdateAvailabilityAndRatesForUnitTypeRequest $request
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function updateAvailabilityAndRatesForUnitType(UpdateAvailabilityAndRatesForUnitTypeRequest $request)
    {
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting all rentl.io document types enumeration used for a guest
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listAllDocumentTypes()
    {
        $request = new ListAllDocumentTypesRequest();
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting all rentl.io arrival arrangements enumeration used for a guest
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listAllArrivalArrangements()
    {
        $request = new ListAllArrivalArrangementsRequest();
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting all rentl.io tourist tax categories enumeration used for a guest
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listAllTouristTaxCategories()
    {
        $request = new ListAllTouristTaxCategoriesRequest();
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting all rentl.io provided service types enumeration used for a guest
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listAllProvidedServiceTypes()
    {
        $request = new ListAllProvidedServiceTypesRequest();
        return $this->send($request);
    }

    /**
     * Calls api endpoint for getting all reservations in date range
     * for specified propertyId where reservation holders that are checked-in in some date range
     *
     * @param $propertyId
     * @param \DateTime $dateFrom
     * @param \DateTime $dateTo
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function listAllCheckedInGuests($propertyId, \DateTime $dateFrom, \DateTime $dateTo)
    {
        $request = new ListAllCheckedInGuestsRequest($propertyId);
        $request->setDateFrom($dateFrom->format('Y-m-d'));
        $request->setDateTo($dateTo->format('Y-m-d'));
        return $this->send($request);
    }

    /**
     * Calls api endpoint for making check-out on reservation
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function checkoutReservation($reservationsId, CheckOut $checkOut)
    {
        $request = new CheckOutRequest($reservationsId, $checkOut);
        return $this->send($request);
    }

}