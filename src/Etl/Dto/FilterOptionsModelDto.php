<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;

class FilterOptionsModel
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $fuzziness;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $prefix_length;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $boost;
}
