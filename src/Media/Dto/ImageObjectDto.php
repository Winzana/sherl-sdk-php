<?php

namespace Sherl\Sdk\Media\Dto;

use Sherl\Sdk\Media\Dto\ImageObjectDto;

use JMS\Serializer\Annotation as Serializer;

class ImageObjectDto
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
   * @var ImageObjectDto
   * @Serializer\Type("Sherl\Sdk\Media\Dto\ImageObjectDto")
   */
    public $caption;

    /**
   * @var ImageObjectDto
   * @Serializer\Type("Sherl\Sdk\Media\Dto\ImageObjectDto")
   */
    public $thumbnail;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdAt;
}
