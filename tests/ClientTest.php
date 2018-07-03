<?php


class ClientTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var \Rentlio\Api\Client
     */
    private $client;

    /**
     * @var array
     */
    private $container;

    /**
     * We are mocking transport layer GuzzleHttp\Client,
     * so we are able to track what kind of requests are sent when calling
     * client methods.
     */
    public function setUp()
    {
        $this->container = [];
        $history         = \GuzzleHttp\Middleware::history($this->container);


        $mockResponse = new GuzzleHttp\Handler\MockHandler([
            new \GuzzleHttp\Psr7\Response(200, ['X-Foo' => 'Bar'])
        ]);

        $stack = \GuzzleHttp\HandlerStack::create($mockResponse);

        $stack->push($history);

        $transport = new GuzzleHttp\Client(['handler' => $stack]);

        $this->client = new \Rentlio\Api\Client('some api key');
        $this->client->setTransport($transport);
    }


    public function testIsThereAnySyntaxError()
    {
        $var = new Rentlio\Api\Client("some api key");
        $this->assertTrue(is_object($var));
    }

    public function testSetBaseUrl()
    {
        $client = new Rentlio\Api\Client("some api key");
        $this->assertTrue(is_object($client->setBaseUrl("https://api.rentl.io/v2")));
    }

    public function testGetMyData()
    {
        $this->client->getMyData();

        $this->assertEquals(1, $this->count($this->container));

        /**
         * @var $request \Psr\Http\Message\RequestInterface
         */
        $request = $this->container[0]['request'];

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('some api key', $request->getHeader('apiKey')[0]);
        $this->assertEquals(
            'https://api.rentl.io/v1/users/me?order_by=id&order_direction=ASC&page=1',
            (string)$request->getUri()
        );
        $this->assertEmpty($request->getBody()->getContents());
    }

    public function testListAllCurrencies()
    {
        $this->client->listAllCurrencies();

        /**
         * @var $request \Psr\Http\Message\RequestInterface
         */
        $request = $this->container[0]['request'];

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('some api key', $request->getHeader('apiKey')[0]);
        $this->assertEquals(
            'https://api.rentl.io/v1/enums/currencies?order_by=id&order_direction=ASC&page=1',
            (string)$request->getUri()
        );
        $this->assertEmpty($request->getBody()->getContents());
    }

    public function testListAllProperties()
    {
        $this->client->listAllProperties();

        /**
         * @var $request \Psr\Http\Message\RequestInterface
         */
        $request = $this->container[0]['request'];

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('some api key', $request->getHeader('apiKey')[0]);
        $this->assertEquals(
            'https://api.rentl.io/v1/properties?order_by=id&order_direction=ASC&page=1',
            (string)$request->getUri()
        );
        $this->assertEmpty($request->getBody()->getContents());
    }

    public function testListAllReservations()
    {
        $request = new \Rentlio\Api\Request\ListAllReservationsRequest();
        $request
            ->setSortBy('name')
            ->setSortOrder('DESC')
            ->setUnitsId(123)
            ->setPropertiesId(1)
            ->setStatus(1);

        $this->client->listAllReservations($request);

        /**
         * @var $request \Psr\Http\Message\RequestInterface
         */
        $request = $this->container[0]['request'];

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('some api key', $request->getHeader('apiKey')[0]);
        $this->assertEquals(
            'https://api.rentl.io/v1/reservations?order_by=name&order_direction=DESC&page=1&status=1&unitsId=123&propertiesId=1',
            (string)$request->getUri()
        );
        $this->assertEmpty($request->getBody()->getContents());
    }

    public function testListAllReservationStatuses()
    {
        $this->client->listAllReservationStatuses();

        /**
         * @var $request \Psr\Http\Message\RequestInterface
         */
        $request = $this->container[0]['request'];

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('some api key', $request->getHeader('apiKey')[0]);
        $this->assertEquals(
            'https://api.rentl.io/v1/enums/reservations/statuses?order_by=id&order_direction=ASC&page=1',
            (string)$request->getUri()
        );
        $this->assertEmpty($request->getBody()->getContents());
    }

    public function testListAllReservationsTodayForUnit()
    {
        $this->client->listAllReservationsTodayForUnit(123);

        /**
         * @var $request \Psr\Http\Message\RequestInterface
         */
        $request = $this->container[0]['request'];

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('some api key', $request->getHeader('apiKey')[0]);
        $this->assertEquals(
            'https://api.rentl.io/v1/units/123/reservations/today?order_by=id&order_direction=ASC&page=1',
            (string)$request->getUri()
        );
        $this->assertEmpty($request->getBody()->getContents());
    }

    public function testListAllServicesForProperty()
    {
        $this->client->listAllServicesForProperty(98763);

        /**
         * @var $request \Psr\Http\Message\RequestInterface
         */
        $request = $this->container[0]['request'];

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('some api key', $request->getHeader('apiKey')[0]);
        $this->assertEquals(
            'https://api.rentl.io/v1/properties/98763/services?order_by=id&order_direction=ASC&page=1',
            (string)$request->getUri()
        );
        $this->assertEmpty($request->getBody()->getContents());
    }

    public function testListAllServicesPaymentTypes()
    {
        $this->client->listAllServicesPaymentTypes();

        /**
         * @var $request \Psr\Http\Message\RequestInterface
         */
        $request = $this->container[0]['request'];

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('some api key', $request->getHeader('apiKey')[0]);
        $this->assertEquals(
            'https://api.rentl.io/v1/enums/services/payment-types?order_by=id&order_direction=ASC&page=1',
            (string)$request->getUri()
        );
        $this->assertEmpty($request->getBody()->getContents());
    }

    public function testListAllUnits()
    {
        $this->client->listAllUnits(7654);

        /**
         * @var $request \Psr\Http\Message\RequestInterface
         */
        $request = $this->container[0]['request'];

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('some api key', $request->getHeader('apiKey')[0]);
        $this->assertEquals(
            'https://api.rentl.io/v1/properties/7654/units?order_by=id&order_direction=ASC&page=1',
            (string)$request->getUri()
        );
        $this->assertEmpty($request->getBody()->getContents());
    }

    public function testListAllUnitTypes()
    {
        $this->client->listAllUnitTypes(7654);

        /**
         * @var $request \Psr\Http\Message\RequestInterface
         */
        $request = $this->container[0]['request'];

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('some api key', $request->getHeader('apiKey')[0]);
        $this->assertEquals(
            'https://api.rentl.io/v1/properties/7654/unit-types?order_by=id&order_direction=ASC&page=1',
            (string)$request->getUri()
        );
        $this->assertEmpty($request->getBody()->getContents());
    }

    public function testListAvailableUnitTypes()
    {
        $dateFrom = DateTime::createFromFormat('d.m.Y', '31.05.1983');
        $dateTo   = DateTime::createFromFormat('d.m.Y', '31.12.2020');
        $this->client->listAvailableUnitTypes(7654, $dateFrom, $dateTo);

        /**
         * @var $request \Psr\Http\Message\RequestInterface
         */
        $request = $this->container[0]['request'];

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('some api key', $request->getHeader('apiKey')[0]);
        $this->assertEquals(
            'https://api.rentl.io/v1/properties/7654/unit-types/available?order_by=id&order_direction=ASC&page=1&dateFrom=1983-05-31&dateTo=2020-12-31',
            (string)$request->getUri()
        );
        $this->assertEmpty($request->getBody()->getContents());
    }

    public function testListUnitTypeAvailability()
    {
        $dateFrom = DateTime::createFromFormat('d.m.Y', '31.05.1983');
        $dateTo   = DateTime::createFromFormat('d.m.Y', '31.12.2020');
        $this->client->listUnitTypeAvailability(7654, $dateFrom, $dateTo);

        /**
         * @var $request \Psr\Http\Message\RequestInterface
         */
        $request = $this->container[0]['request'];

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('some api key', $request->getHeader('apiKey')[0]);
        $this->assertEquals(
            'https://api.rentl.io/v1/unit-types/7654/availability?order_by=id&order_direction=ASC&page=1&dateFrom=1983-05-31&dateTo=2020-12-31',
            (string)$request->getUri()
        );
        $this->assertEmpty($request->getBody()->getContents());
    }

    public function testListUnitTypeRates()
    {
        $dateFrom = DateTime::createFromFormat('d.m.Y', '31.05.1983');
        $dateTo   = DateTime::createFromFormat('d.m.Y', '31.12.2020');
        $this->client->listUnitTypeRates(7654, $dateFrom, $dateTo);

        /**
         * @var $request \Psr\Http\Message\RequestInterface
         */
        $request = $this->container[0]['request'];

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('some api key', $request->getHeader('apiKey')[0]);
        $this->assertEquals(
            'https://api.rentl.io/v1/unit-types/7654/rates?order_by=id&order_direction=ASC&page=1&dateFrom=1983-05-31&dateTo=2020-12-31',
            (string)$request->getUri()
        );
        $this->assertEmpty($request->getBody()->getContents());
    }

    public function testCreateInvoiceItem()
    {
        $request = new \Rentlio\Api\Request\CreateInvoiceItemForReservationRequest(123);
        $item    = new \Rentlio\Api\Request\Data\InvoiceItem("cola", 123.33, 0.5);
        $item->addPDVTax(13);
        $request->setInvoiceItem($item);

        $this->client->createInvoiceItem($request);

        /**
         * @var $request \Psr\Http\Message\RequestInterface
         */
        $request = $this->container[0]['request'];

        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('some api key', $request->getHeader('apiKey')[0]);
        $this->assertEquals(
            'https://api.rentl.io/v1/reservations/123/invoices/items',
            (string)$request->getUri()
        );
        $this->assertEquals(
            '{"description":"cola","price":123.33,"quantity":0.5,"taxes":[{"label":"PDV","rate":13}]}',
            $request->getBody()->getContents()
        );
    }

    public function testUpdateAvailabilityAndRatesForUnitType()
    {
        $request = new \Rentlio\Api\Request\UpdateAvailabilityAndRatesForUnitTypeRequest(234);

        $update = new \Rentlio\Api\Request\Data\AvailabilityAndRatesUpdate("2016-05-01");
        $update->setPrice(123.33);
        $request->addUpdate($update);

        $secondUpdate = new \Rentlio\Api\Request\Data\AvailabilityAndRatesUpdate("2016-05-02");
        $secondUpdate->setAvailability(3);
        $request->addUpdate($secondUpdate);

        $this->client->updateAvailabilityAndRatesForUnitType($request);

        /**
         * @var $request \Psr\Http\Message\RequestInterface
         */
        $request = $this->container[0]['request'];

        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('some api key', $request->getHeader('apiKey')[0]);
        $this->assertEquals(
            'https://api.rentl.io/v1/unit-types/234/availrates',
            (string)$request->getUri()
        );
        $this->assertEquals(
            '{"days":[{"date":"2016-05-01","price":123.33},{"date":"2016-05-02","availability":3}]}',
            $request->getBody()->getContents()
        );
    }

    public function testCheckOutRequest()
    {
        $checkOut = new \Rentlio\Api\Request\Data\CheckIn(true);
        $this->client->checkInReservation(1, $checkOut);

        /**
         * @var $request \Psr\Http\Message\RequestInterface
         */
        $request = $this->container[0]['request'];

        $this->assertEquals('PUT', $request->getMethod());
        $this->assertEquals('some api key', $request->getHeader('apiKey')[0]);
        $this->assertEquals(
            'https://api.rentl.io/v1/reservations/1/checkin',
            (string)$request->getUri()
        );
        $this->assertEquals(
            '{"checkIn":true}',
            $request->getBody()->getContents()
        );
    }
}