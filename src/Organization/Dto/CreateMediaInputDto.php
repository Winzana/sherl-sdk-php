<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

class CreateMediaInputDto
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
    public $uri;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $width;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $height;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $caption;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $thumbnail;
}
