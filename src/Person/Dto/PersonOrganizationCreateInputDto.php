<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Dto\AddressInputDto;

class PersonOrganizationCreateInputDto
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
     * @var string
     * @Serializer\Type("string")
     */
    public $legalName;

    /**
     * @var AddressInputDto
     * @Serializer\Type("Sherl\Sdk\Person\Dto\AddressInputDto")
     */
    public $location;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $subOrganizations;
}
