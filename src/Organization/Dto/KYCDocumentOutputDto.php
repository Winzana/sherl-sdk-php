<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Dto\PersonOutputDto;

use Sherl\Sdk\Organization\Enum\KYCDocumentTypeEnum;
use Sherl\Sdk\Organization\Enum\KYCDocumentStatusEnum;
use Sherl\Sdk\Organization\Enum\KYCDocumentRefusedReasonTypeEnum;

use Sherl\Sdk\Media\Dto\ImageObjectOutputDto;

use DateTime;

class KYCDocumentOutputDto
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
    public $organizationId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $consumerId;

    /**
     * @var KYCDocumentTypeEnum
     * @Serializer\Type("KYCDocumentTypeEnum")
     */
    public $type;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $tag;

    /**
     * @var string
     * @Serializer(Type("string"))
     */
    public $originId;

    /**
     * @var DateTime
     * @Serializer(Type("DateTime"))
     */
    public $creationDate;

    /**
     * @var DateTime
     * @Serializer(Type("DateTime"))
     */
    public $processedDate;

    /**
     * @var KYCDocumentStatusEnum
     * @Serializer(Type("KYCDocumentStatusEnum"))
     */
    public $status;

    /**
     * @var KYCDocumentRefusedReasonTypeEnum
     * @Serializer(Type("KYCDocumentRefusedReasonTypeEnum"))
     */
    public $refusedReasonType;

    /**
     * @var string
     * @Serializer(Type("string"))
     */
    public $refusedReasonMessage;

    /**
     * @var ImageObjectOutputDto
     * @Serializer(Type("Sherl\Sdk\Media\Dto\ImageObjectOutputDto"))
     */
    public $media;

    /**
     * @var DateTime
     * @Serializer(Type("DateTime"))
     */
    public $createdAt;

    /**
     * @var DateTime
     * @Serializer(Type("DateTime"))
     */
    public $updatedAt;
}
