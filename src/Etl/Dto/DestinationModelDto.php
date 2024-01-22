<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Enum\LoaderTypeEnum;
use Sherl\Sdk\Etl\Enum\DatabaseLoaderTypeEnum;

class DestinationModelDto
{
    /**
     * @var LoaderTypeEnum
     * @Serializer\Type("Sherl\Sdk\Etl\Dto\LoaderTypeEnum")
     */
    public $loaderType;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $database;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $collection;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $entity;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $indexed;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $user;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $password;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $host;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $port;

    /**
     * @var DatabaseLoaderTypeEnum
     * @Serializer\Type("Sherl\Sdk\Etl\Dto\DatabaseLoaderTypeEnum")
     */
    public $databaseType;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $uniqueFields;
}
