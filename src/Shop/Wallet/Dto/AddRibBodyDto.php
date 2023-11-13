<?php

namespace Sherl\Sdk\Shop\Wallet\Dto;

use JMS\Serializer\Annotation as Serializer;

class AddRibBodyDto
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
