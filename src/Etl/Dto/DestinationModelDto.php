<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Enum\LoaderType;
use Sherl\Sdk\Etl\Enum\DatabaseLoaderType;

class DestinationModel
{
    /**
     * @var LoaderType
     * @Serializer\Type("Sherl\Sdk\Etl\Dto\LoaderType")
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
     * @var bool
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
     * @var DatabaseLoaderType
     * @Serializer\Type("Sherl\Sdk\Etl\Dto\DatabaseLoaderType")
     */
    public $databaseType;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    public $uniqueFields;
}
