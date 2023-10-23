<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Enum\HttpRequestType;
use Sherl\Sdk\Etl\Enum\MimeType;

class OptionsModel
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $endpoint;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    public $header;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    public $query;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $dataAttribute;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $pageAttribute;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $itemPerPageAttribute;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $itemsPerPageValue;

    /**
     * @var HttpRequestType
     * @Serializer\Type("Sherl\Sdk\Etl\Enum\HttpRequestType")
     */
    public $type;

    /**
     * @var MimeType
     * @Serializer\Type("Sherl\Sdk\Etl\Enum\MimeType")
     */
    public $mimeType;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $totalItemsHeader;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $totalItemsAttribute;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    public $isPaginationZeroBased;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    public $isPaginationOffsetBased;
}