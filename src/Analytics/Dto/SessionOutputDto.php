<?php

namespace Sherl\Sdk\Analytic\Dto; // Assurez-vous d'ajuster l'espace de noms selon vos besoins

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Analytics\Enum\DevicesEnum;
use Sherl\Sdk\Analytics\Enum\SourcesEnum;

class SessionOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var string
     * @Serializer.Type("string")
     */
    public $uri;

    /**
     * @var string
     * @Serializer.Type("string")
     */
    public $ipAddress;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdAt;

    /**
     * @var string
     * @Serializer.Type("string")
     */
    public $updatedAt;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    public $keywords;

    /**
     * @var DevicesEnum
     * @Serializer\Type("Sherl\Sdk\Analytics\Enum\DevicesEnum")
     */
    public $device;

    /**
     * @var SourcesEnum
     * @Serializer.Type("Sherl\Sdk\Analytics\Enum\SourcesEnum")
     */
    public $source;

    /**
     * @var IGeoPoint
     * @Serializer\Type("IGeoPoint") // TODO : Remplace with merged
     */
    public $location;

    /**
     * @var ISessionSearchHistory
     * @Serializer\Type("ISessionSearchHistory") // TODO :
     */
    public $searchHistory;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    public $uriOfPanels;

    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $metadatas;
}
