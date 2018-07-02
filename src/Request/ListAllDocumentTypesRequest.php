<?php

namespace Rentlio\Api\Request;

/**
 * Class ListAllDocumentTypesRequest
 * @package Rentlio\Api\Request
 *
 * GET Request for listing all document types an guest can be checked used in rentl.io
 * This is enumeration, that can be used inside other api calls, when needed.
 * https://docs.rentl.io/#enums-list-all-document-types
 */
class ListAllDocumentTypesRequest extends AbstractRequest
{
    public function __construct()
    {
        parent::__construct("GET", "/enums/guests/document-types");
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        return [];
    }
}