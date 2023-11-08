<?php

namespace Sherl\Sdk\Search\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Product\Dto\CategoryOutputDto;
// use Sherl\Sdk\Organization\Dto\OrganizationOutputDto; // TODO: adjust import when Organization merged

class SearchResultOutputDto
{
    /**
     * @var OrganizationOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Organization\Dto\OrganizationOutputDto>") // TODO: change import when Organization merged
     */
    public $organization;

    /**
     * @var CategoryOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\CategoryOutputDto>")
     */
    public $category;

}
