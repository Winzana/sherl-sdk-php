<?php

namespace Sherl\Sdk\Analytics\Dto;

use JMS\Serializer\Annotation as Serializer;

class SessionGeopointFieldDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $latitude;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $longitude;

    /**
     * @var string
    * @Serializer\Type("string")
    */
    public $value;

    /**
     * @var int
    * @Serializer.Type("int")
    */
    public $count;

    /**
     * @var string
    * @Serializer.Type("string")
    */
    public $createdAt;

    /**
     * @var string
    * @Serializer.Type("string")
    */
    public $updatedAt;
}
