<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Calendar\Dto\CalendarEventOutputDto;
use Sherl\Sdk\Calendar\Dto\OpeningHoursSpecificationOutputDto;

use Sherl\Sdk\Media\Dto\ImageObjectOutputDto;

use Sherl\Sdk\Shop\Product\Dto\CategoryOutputDto;
use Sherl\Sdk\Shop\Product\Dto\ProductOutputDto;
use Sherl\Sdk\Shop\Subscription\Dto\SubscriptionOutputDto;
use Sherl\Sdk\Shop\Wallet\Dto\WalletOutputDto;

use Sherl\Sdk\Organization\Dto\OrganizationCommunicationOutputDto;
use Sherl\Sdk\Organization\Dto\ThridPartyOutputDto;
use Sherl\Sdk\Organization\Dto\TaxonomyOutputDto;
use Sherl\Sdk\Organization\Dto\OrganizationDisplayedOutputDto;
use Sherl\Sdk\Organization\Dto\PersonConfigValueOutputDto;
use Sherl\Sdk\Organization\Dto\EmployeeOutputDto;
use Sherl\Sdk\Organization\Dto\FounderOutputDto;

use Sherl\Sdk\Quotas\Dto\QuotaOutputDto;

use Sherl\Sdk\Place\Dto\AddressOutputDto;
use Sherl\Sdk\Place\Dto\PlaceOutputDto;

class OrganizationInputDto
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
    public $legalName;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $siret;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $createdAt;

    /**
     * @var PlaceOutputDto
     * @Serializer\Type("Sherl\Sdk\Place\Dto\PlaceOutputDto")
     */
    public $location;
}
