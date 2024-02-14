<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Organization\Enum\KYCDocumentTypeEnum;
use Sherl\Sdk\Media\Dto\ImageObjectOutputDto;

class AddKYCDocumentInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var KYCDocumentTypeEnum
     * @Serializer\Type("enum<'Sherl\Sdk\Organization\Enum\KYCDocumentTypeEnum', 'value'>")
     */
    public $type;

    /**
     * @var ImageObjectOutputDto
     * @Serializer\Type("Sherl\Sdk\Media\Dto\ImageObjectOutputDto")
     */
    public $media;
}
