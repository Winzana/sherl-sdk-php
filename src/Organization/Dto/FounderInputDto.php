<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

class FounderInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $firstName;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $lastName;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $birthDate;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $email;
}
