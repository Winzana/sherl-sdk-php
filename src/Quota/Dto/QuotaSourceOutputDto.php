<?php

namespace Sherl\Sdk\Quota\Dto;

use JMS\Serializer\Annotation as Serializer;

class QuotaSourceOutputDto
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
    public $lastApply;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $nextApply;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $amount;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $remaining;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdFrom;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdBy;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdAt;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $quotaId;
}
