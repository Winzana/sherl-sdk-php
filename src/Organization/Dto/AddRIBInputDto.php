<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

class AddRIBInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $iban;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $bic;

}
