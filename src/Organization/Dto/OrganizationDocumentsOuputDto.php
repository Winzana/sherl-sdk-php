<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

class OrganizationDocumentsOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $bic;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $iban;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $ibanId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $status;
}
