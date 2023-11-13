<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Organization\Dto\MediaInputDto;

class MediaInputDto
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
     * @var CaptionInputDto
     * @Serializer\Type("CaptionInputDto")
     */
    public $caption;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $domain;

}
