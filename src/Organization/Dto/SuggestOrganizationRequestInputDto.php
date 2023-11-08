<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Organization\Dto\OrganizationInputDto;
use Sherl\Sdk\Person\Dto\PersonOutputDto;
use Sherl\Sdk\Place\Dto\PlaceOutputDto; 

class SuggestOrganizationRequestInputDto
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
     * @var PlaceOutputDto
     * @Serializer\Type("Sherl\Sdk\Place\Dto\PlaceOutputDto")
     */
    public $location;

    /**
    * @var TaxonomyOutputDto[]
    * @Serializer\Type("array<Sherl\Sdk\Organization\Dto\TaxonomyOutputDto>")
    */
    public $serviceType;

}
