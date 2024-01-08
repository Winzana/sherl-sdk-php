<?php

namespace Sherl\Sdk\Search\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Category\Dto\ProductCategoryDto;
use Sherl\Sdk\Organization\Dto\OrganizationOutputDto;

class SearchResultOutputDto
{
    /**
     * @var OrganizationOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Organization\Dto\OrganizationOutputDto>")
     */
    public $organization;

    /**
     * @var ProductCategoryDto[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Category\Dto\ProductCategoryDto>")
     */
    public $category;

}
