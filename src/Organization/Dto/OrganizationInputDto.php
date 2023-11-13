<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Place\Dto\PlaceOutputDto;

class OrganizationInputDto
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
    public $legalName;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $siret;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $createdAt;

    /**
     * @var PlaceOutputDto
     * @Serializer\Type("Sherl\Sdk\Place\Dto\PlaceOutputDto")
     */
    public $location;
}
