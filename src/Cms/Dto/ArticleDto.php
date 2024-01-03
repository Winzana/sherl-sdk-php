<?php

namespace Sherl\Sdk\Cms\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Cms\Enum\ArticleType;
use Sherl\Sdk\Cms\Enum\ArticleStatus;
use Sherl\Sdk\Person\Dto\PersonOutputDto;
use Sherl\Sdk\Media\Dto\ImageObjectOutputDto;

class ArticleDto
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
    public $title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $slug;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $resume;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $content;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    public $consumerId;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    public $organizationUri;

    /**
     * @var ArticleType
     * @Serializer\Type("Sherl\Sdk\Cms\Enum\ArticleType")
     */
    public $type;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $authorUri;

    /**
     * @var PersonOutputDto|null
     * @Serializer\Type("Sherl\Sdk\Person\Dto\PersonOutputDto")
     */
    public $author;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     */
    public $beginDate;

    /**
     * @var \DateTime|null
     * @Serializer\Type("DateTime")
     */
    public $endDate;

    /**
     * @var array<string>
      * @Serializer\Type("array<string>")
     */
    public $tokens;

    /**
     * @var ArticleStatus
     * @Serializer\Type("Sherl\Sdk\Cms\Enum\ArticleStatus")
     */
    public $status;

    /**
     * @var ImageObjectOutputDto|null
     * @Serializer\Type("Sherl\Sdk\Media\Dto\ImageObjectOutputDto")
     */
    public $media;

    /**
    * @var array<string, mixed>
    * @Serializer\Type("array<string, mixed>")
     */
    public $metadatas;

    /**
     * @var \DateTime|null
     * @Serializer\Type("DateTime")
     */
    public $createdAt;

    /**
     * @var \DateTime|null
     * @Serializer>Type("DateTime")
     */
    public $updatedAt;
}
