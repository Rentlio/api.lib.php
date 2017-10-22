Rentl.io Public Api PHP Client lib
==================================

This library is official PHP rentl.io api client. Api documentation can be found [here](https://docs.rentl.io)


## USAGE
To be able to use this lib, or rentlio api in general you first need to generate apiKey.
You can do that inside developers section in rentlio web app. 

Please create separate api key for each integration you are creating. This way you can easily invalidate some of api keys without affecting others. 
Also please keep you api keys private. Don't include to VCS or similar. 

### Responses
All client methods will return \Psr\Http\Message\ResponseInterface.

### Authentication
```php
use Rentlio\Api\Client;
    
$client = new Client("put your api key here");

```

### Sending requests
```php
use Rentlio\Api\Client;
use Rentlio\Api\Request\CreateInvoiceItemForReservationRequest;
use Rentlio\Api\Request\Data\InvoiceItem;

$client = new Client("put your api key here");

$request     = new CreateInvoiceItemForReservationRequest(45);
$invoiceItem = new InvoiceItem("cola", 13.99, 0.5);
$invoiceItem->addPDVTax(13);
$request->setInvoiceItem($invoiceItem);

$response = $client->send($request);

```

### Using client methods
```php
use Rentlio\Api\Client;

$client   = new Client("put your api key here");
$response = $client->listAllServicesPaymentTypes();

echo $response->getBody()->getContents();
```

## Dependencies
Rentlio php api client depends on [guzzleHttp](http://docs.guzzlephp.org/en/stable/) library

## Contribution
If you would like to contribute, fix bugs, please fork this repo and create Pull Request when you are done with development.
All code should fallow PSR and should be tested. 

## License
Mit
