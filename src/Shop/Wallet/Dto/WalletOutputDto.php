<?php

namespace Sherl\Sdk\Shop\Wallet\Dto;

use JMS\Serializer\Annotation as Serializer;

class WalletOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $userId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $walletId;
}
