<?php

namespace Sherl\Sdk\Common\Dto;

use JMS\Serializer\Annotation as Serializer;

class DateFilterOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $after;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $strictlyAfter;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $before;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $strictlyBefore;

}
