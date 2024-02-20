<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Enum\AccountType;
use Sherl\Sdk\Person\Dto\AddressInputDto;

class PersonAddAddressInputDto extends AddressInputDto
{

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $types;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $consumerId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $updatedAt;

    /**
     * @var AccountType
     * @Serializer\Type("Sherl\Sdk\Person\Enum\AccountType")
     */
    public $type;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isDefault;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $googleToken;
}
