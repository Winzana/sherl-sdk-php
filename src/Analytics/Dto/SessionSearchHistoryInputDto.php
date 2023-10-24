<?php

namespace Sherl\Sdk\Analytics\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Analytics\Dto\SessionSearchHistoryGenericInputDto;
use Sherl\Sdk\Analytics\Dto\SessionSearchHistoryGeopointInputDto;

class SessionSearchHistoryInputDto
{
    /**
     * @var array
     * @Serializer\Type("array<string, SessionSearchHistoryGenericInputDto>")
     */
    public $keywords;

    /**
     * @var array
     * @Serializer\Type("array<string, SessionSearchHistoryGenericInputDto>")
     */
    public $categoryUris;

    /**
     * @var array
     * @Serializer.Type("array<string, SessionSearchHistoryGenericInputDto>")
     */
    public $languages;

    /**
     * @var array
     * @Serializer.Type("array<string, SessionSearchHistoryGeopointInputDto>")
     */
    public $geopoints;

    /**
     * @var array
     * @Serializer.Type("array<string, SessionSearchHistoryGenericInputDto>")
     */
    public $metadatas;

    /**
     * @var array
     * @Serializer.Type("array<string, SessionSearchHistoryGenericInputDto>")
     */
    public $fulltext;
}
