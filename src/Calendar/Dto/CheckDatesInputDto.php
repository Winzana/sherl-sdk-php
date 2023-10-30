<?php

namespace Sherl\Sdk\Calendar\Dto;

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
