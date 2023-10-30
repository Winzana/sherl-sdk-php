<?php

namespace Sherl\Sdk\Iam\Dto;

use JMS\Serializer\Annotation as Serializer;

class IamProfilesFilterDto {
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $page;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $itemsPerPage;
}