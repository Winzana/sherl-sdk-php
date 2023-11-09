<?php

namespace Sherl\Sdk\Shop\Advertisement\Dto;

use JMS\Serializer\Annotation as Serializer;

class AdvertisementTranslationOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $lang;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $description;


}
