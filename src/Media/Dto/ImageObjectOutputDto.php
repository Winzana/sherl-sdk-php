<?php

namespace Sherl\Sdk\Media\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Media\Dto\MediaObjectOutputDto;

use DateTime;

class ImageObjectOutputDto
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
    public $consumerId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $domain;

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
     * @var MediaObjectOutputDto
     * @Serializer\Type("Sher\Sdk\Media\Dto\MediaObjectOutputDto")
     */
    public $caption;

    /**
     * @var ImageObjectOutputDto
     * @Serializer\Type("Sherl\Sdk\Media\Dto\ImageObjectOutputDto")
     */
    public $thumbnail;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $createdAt;
}
