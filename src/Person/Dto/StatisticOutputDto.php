<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Person\Dto\FrequentedEstablishmentOutputDto;

class StatisticOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $lastVisit;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $firstVisit;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $totalVisit;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $amountLastOrder;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $amountTotalOrder;

    /**
     * @var FrequentedEstablishmentOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Person\Dto\FrequentedEstablishmentOutputDto>")
     */
    public $frequentedEstablishments;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $loyalCustomer;
}
