<?php

namespace Sherl\Sdk\Calendat\Dto;

class CheckDatesInputDto
{
    /**
     * @var string
     */
    public $ownerUri;

    /**
     * @var mixed
     */
    public $metadatas;

    /**
     * @var Avaibility[]
     */
    public $dates;
}
