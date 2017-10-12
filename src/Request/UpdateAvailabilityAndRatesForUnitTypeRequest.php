<?php

namespace Rentlio\Api\Request;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Rentlio\Api\Model;

class UpdateAvailabilityAndRatesForUnitTypeRequest extends PostAbstractRequest
{

    public function __construct($id, $body, array $headers = [], $version = '1.1')
    {
        parent::__construct("POST", "/unit-types/" . $id . "/availrates", $headers, json_encode($body), $version);
    }
}