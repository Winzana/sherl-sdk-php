<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;


class FilterOptionsModel
{
    /**
     * @var int|null
     * @Serializer\Type("number")
     */
    public $fuzziness;

    /**
     * @var int|null
     * @Serializer\Type("number")
     */
    public $prefix_length;

    /**
     * @var int|null
     * @Serializer\Type("number")
     */
    public $boost;
}