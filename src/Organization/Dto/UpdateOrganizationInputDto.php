<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Organization\Dto\MediaInputDto;
use Sherl\Sdk\Calendar\Dto\OpeningHoursSpecificationOutputDto;
use Sherl\Sdk\Organization\Dto\ThridPartyOutputDto;
use Sherl\Sdk\Place\Dto\PlaceOutputDto;

class UpdateOrganizationInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $legalName;

    /**
     * @var PlaceOutputDto
     * @Serializer\Type("Sherl\Sdk\Place\Dto\PlaceOutputDto")
     */
    public $location;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $enabled;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isPublic;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isComingSoon;

    /**
     * @var array<string,mixed>
     * @Serializer\Type("array<string,mixed>")
     */
    public $metadatas;

    /**
    * @var OpeningHoursSpecificationOutputDto[]
    * @Serializer\Type("array<Sherl\Sdk\Calendar\Dto\OpeningHoursSpecificationOutputDto>")
    */
    public $openingHoursSpecification;

    /**
     * @var ThridPartyOutputDto
     * @Serializer\Type("Sherl\Sdk\Organization\Dto\ThridPartyOutputDto")
     */
    public $thirdParty;

}
