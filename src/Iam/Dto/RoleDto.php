<?php

namespace Sherl\Sdk\Iam\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Iam\Dto\StatementDto;

class RoleDto
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
     * @var string
     * @Serializer\Type("string")
     */
    public $description;

    /**
     * @var StatementDto[]
     * @Serializer\Type("array<Sherl\Sdk\Iam\Dto\StatementDto>")
     */
    public $statement;

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