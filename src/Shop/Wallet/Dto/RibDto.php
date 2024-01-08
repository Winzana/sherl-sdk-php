<?php

namespace Sherl\Sdk\Shop\Wallet\Dto;

use JMS\Serializer\Annotation as Serializer;

class RibDto
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

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $ibanId;
}
