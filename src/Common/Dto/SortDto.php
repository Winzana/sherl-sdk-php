<?php

namespace Sherl\Sdk\Common\Dto;

/**
 * @template T
 */
class SortDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $field;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $order;
}
