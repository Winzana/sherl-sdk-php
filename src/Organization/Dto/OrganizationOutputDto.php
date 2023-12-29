<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Calendar\Dto\CalendarEventOutputDto;
use Sherl\Sdk\Calendar\Dto\OpeningHoursSpecificationOutputDto;

use Sherl\Sdk\Media\Dto\ImageObjectOutputDto;

use Sherl\Sdk\Shop\Category\Dto\ProductCategoryDto;
use Sherl\Sdk\Shop\Product\Dto\ProductOutputDto;
use Sherl\Sdk\Shop\Subscription\Dto\SubscriptionDto;
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

class OrganizationOutputDto
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
    public $sponsorshipCode;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $sponsoredByCode;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $sponsoredByUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $slug;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $consumerId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $legalName;

    /**
     * @var PlaceOutputDto
     * @Serializer\Type("Sherl\Sdk\Place\Dto\PlaceOutputDto")
     */
    public $location;

    /**
     * @var AddressOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Place\Dto\AddressOutputDto>")
     */
    public $myAddresses;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $aggregateRating;

    /**
     * @var OrganizationOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Organization\Dto\OrganizationOutputDto>")
     */
    public $subOrganizations;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $email;

    /**
     * @var EmployeeOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Organization\Dto\EmployeeOutputDto>")
     */
    public $employees;

    /**
     * @var WalletOutputDto
     * @Serializer\Type("Sherl\Sdk\Shop\Wallet\Dto\WalletOutputDto")
     */
    public $wallet;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isPaymentAllowed;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $enabled;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $faxNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $phoneNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $website;

    /**
     * @var FounderOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Organization\Dto\FounderOutputDto>")
     */
    public $founders;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $foundingDate;

    /**
     * @var TaxonomyOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Organization\Dto\TaxonomyOutputDto>")
     */
    public $knowsLanguage;

    /**
     * @var ImageObjectOutputDto
     * @Serializer\Type("Sherl\Sdk\Media\Dto\ImageObjectOutputDto")
     */
    public $logo;

    /**
     * @var ImageObjectOutputDto
     * @Serializer\Type("Sherl\Sdk\Media\Dto\ImageObjectOutputDto")
     */
    public $backgroundImage;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $numberOfEmployees;

    /**
     * @var OrganizationOutputDto
     * @Serializer\Type("Sherl\Sdk\Organization\Dto\OrganizationOutputDto")
     */
    public $parentOrganization;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $slogan;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $siret;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $smokingAllowed;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $openNow;

    /**
     * @var OpeningHoursSpecificationOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Calendar\Dto\OpeningHoursSpecificationOutputDto>")
     */
    public $openingHoursSpecification;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isAccessibleForFree;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isComingSoon;

    /**
     * @var ImageObjectOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Media\Dto\ImageObjectOutputDto>")
     */
    public $photos;

    /**
     * @var TaxonomyOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Organization\Dto\TaxonomyOutputDto>")
     */
    public $serviceType;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $types;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $advertisingText;

    /**
     * @var OrganizationCommunicationOutputDto
     * @Serializer\Type("Sherl\Sdk\Organization\Dto\OrganizationCommunicationOutputDto")
     */
    public $communication;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $geopoint;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdAt;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $updatedAt;

    /**
     * @var array<string, mixed>
     * @Serializer\Type("array<string, mixed>")
     */
    public $metadatas;

    /**
     * @var ProductCategoryDto[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\ProductCategoryDto>")
     */
    public $categories;

    /**
     * @var ProductOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\ProductOutputDto>")
     */
    public $products;

    /**
     * @var CalendarEventOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Calendar\Dto\CalendarEventOutputDto>")
     */
    public $events;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isRoaming;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $is;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $calendarId;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $opinion;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $opinionCount;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $blackListPersons;

    /**
     * @var ThridPartyOutputDto
     * @Serializer\Type("Sherl\Sdk\Organization\Dto\ThridPartyOutputDto")
     */
    public $thirdParty;

    /**
     * @var SubscriptionDto
     * @Serializer\Type("Sherl\Sdk\Shop\Subscription\Dto\SubscriptionDto")
     */
    public $statistics;

    /**
     * @var array<string,QuotaOutputDto>
     * @Serializer\Type("array<string, Sherl\Sdk\Quotas\Dto\QuotaOutputDto>")
     */
    public $quotas;


    /**
     * @var PersonConfigValueOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Organization\Dto\PersonConfigValueOutputDto>")
     */
    public $configs;

    /**
     * @var OrganizationDisplayedOutputDto
     * @Serializer\Type("Sherl\Sdk\Organization\Dto\OrganizationDisplayedOutputDto")
     */
    public $displayed;
}
