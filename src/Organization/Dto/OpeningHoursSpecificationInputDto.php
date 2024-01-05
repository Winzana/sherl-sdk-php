<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

class OpeningHoursSpecificationInputDto
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
