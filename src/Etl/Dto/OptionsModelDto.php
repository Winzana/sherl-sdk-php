<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Enum\HttpRequestTypeEnum;
use Sherl\Sdk\Etl\Enum\MimeTypeEnum;

class OptionsModelDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $endpoint;

    /**
     * @var string[]
     * @Serializer\Type("string[]")
     */
    public $header;

    /**
     * @var string[]
     * @Serializer\Type("string[]")
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
     * @var integer
     * @Serializer\Type("integer")
     */
    public $itemsPerPageValue;

    /**
     * @var HttpRequestTypeEnum
     * @Serializer\Type("enum<'Sherl\Sdk\Etl\Enum\HttpRequestTypeEnum', 'value'>")
     */
    public $type;

    /**
     * @var MimeTypeEnum
     * @Serializer\Type("enum<'Sherl\Sdk\Etl\Enum\MimeTypeEnum', 'value'>")
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
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isPaginationZeroBased;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isPaginationOffsetBased;
}
