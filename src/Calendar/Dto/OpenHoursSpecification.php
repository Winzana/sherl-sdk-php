<?php

namespace Sherl\Sdk\Calendat\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Place\Dto\AddressInfoDto;

class CreateAccountInputDto
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $dayOfTheWeek;

    /**
     * @var string
     */
    public $closes;

    /**
     * @var string
     */
    public $open;

    /**
     * @var string
     */
    public $validFrom;

    /**
     * @var string
     */
    public $mobilvalidThrough;
}
