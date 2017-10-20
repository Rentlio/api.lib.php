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
}