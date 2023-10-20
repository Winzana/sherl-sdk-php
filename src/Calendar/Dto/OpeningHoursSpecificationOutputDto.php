<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;

class OpeningHoursSpecificationOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $dayOfWeek;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $closes;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $opens;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $validFrom;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $validThrough;
}
