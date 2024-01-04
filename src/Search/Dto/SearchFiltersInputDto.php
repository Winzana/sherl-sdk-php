<?php

namespace Sherl\Sdk\Search\Dto;

class SearchFiltersInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $q;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $indexes;
}
