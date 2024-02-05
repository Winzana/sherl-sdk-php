<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Place\Dto\AddressFilterDto;

class OrganizationFilterDto 
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
     * @var AddressFilterDto
     * @Serializer\Type("Sherl\Sdk\Place\Dto\AddressFilterDto")
     */
    public $location;

    /**
     * @var OrganizationFilterDto[]
     * @Serializer\Type("array<Sherl\Sdk\Organization\Dto\OrganizationFilterDto>")
     */
    public $subOrganizations;
}