<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Organization\Dto\MediaInputDto;

class UpdateDocumentInputDto
{
    /**
     * @var MediaInputDto
     * @Serializer\Type("Sherl\Sdk\Organization\Dto\MediaInputDto")
     */
    public $media;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $domain;

}
