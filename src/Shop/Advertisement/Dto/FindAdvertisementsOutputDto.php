<?php

namespace Sherl\Sdk\Shop\Advertisement\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Shop\Advertisement\Dto\AdvertisementOutputDto;
use Sherl\Sdk\Common\Dto\Pagination;
use Sherl\Sdk\Common\Dto\ViewOutputDto;

class FindAdvertisementsOutputDto extends Pagination
{
    /**
     * @var AdvertisementOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Advertisement\Dto\AdvertisementOutputDto>")
     */
    public $results;

    /**
     * @var ViewOutputDto
     * @Serializer\Type("Sherl\Sdk\Common\Dto\ViewOutputDto")
     */
    public $view;
}
