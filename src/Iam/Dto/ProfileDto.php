<?php

namespace Sherl\Sdk\Iam\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Iam\Dto\RoleDto;

class ProfileDto
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
    public $uri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var ?string
     * @Serializer\Type("string")
     */
    public $consumerId;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $rolesUri;

    /**
     * @var RoleDto[]
     * @Serializer\Type("array<Sherl\Sdk\Iam\Dto\RoleDto>")
     */
    public $roles;

    /**
     * @var ?DateTime
     * @Serializer\Type("DateTime")
     */
    public $createdAt;

    /**
     * @var ?DateTime
     * @Serializer\Type("DateTime")
     */
    public $updatedAt;
}
