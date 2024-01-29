<?php

namespace Sherl\Sdk\Cms\Dto;

use JMS\Serializer\Annotation as Serializer;
use DateTime;

class CMSArticleUpdateInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $content;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     */
    public $beginDate;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     */
    public $endDate;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $status;
}
