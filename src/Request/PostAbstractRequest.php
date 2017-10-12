<?php

namespace Rentlio\Api\Request;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

abstract class PostAbstractRequest extends Request implements \Psr\Http\Message\RequestInterface
{

}