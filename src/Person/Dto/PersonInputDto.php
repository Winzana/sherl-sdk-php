<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Dto\AddressInputDto;
use Sherl\Sdk\Person\Dto\PersonOrganizationCreateInputDto;
use Sherl\Sdk\Person\Dto\AcceptLegalNoticeInputDto;
use Sherl\Sdk\Person\Dto\AcceptPrivacyNoticeInputDto;
use Sherl\Sdk\Person\Dto\MangopayCardOutputDto;
use Sherl\Sdk\Person\Dto\StripeOutputDto;
use Sherl\Sdk\Person\Dto\FrequentedEstablishmentOutputDto;
use Sherl\Sdk\Person\Dto\SettingsOutputDto;
use Sherl\Sdk\Person\Dto\StatisticOutputDto;

use Sherl\Sdk\Media\Dto\ImageObjectDto;

use Sherl\Sdk\Place\Dto\GeoCoordinatesDto;

use DateTime;

use Sherl\Sdk\Person\Enum\Gender;
use Sherl\Sdk\Person\Enum\PersonType;

class PersonInputDto
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
    public $consumerId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $firstName;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $lastName;

    /**
     * @var AddressInputDto
     * @Serializer\Type("Sherl\Sdk\Person\Dto\AddressInputDto")
     */
    public $address;

    /**
     * @var AddressInputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Person\Dto\AddressInputDto>")
     */
    public $myAddresses;

    /**
   * @var GeoCoordinatesDto
   * @Serializer\Type("Sherl\Sdk\Place\Dto\GeoCoordinatesDto")
   */
    public $subscriptionLocation;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $phoneNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $mobilePhoneNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $faxNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $nationality;

    /**
     * @var PersonOrganizationCreateInputDto
     * @Serializer\Type("Sherl\Sdk\Person\Dto\PersonOrganizationCreateInputDto")
     */
    public $affiliation;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $birthDate;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $email;

    /**
     * @var Gender
     * @Serializer\Type("enum<'Sherl\Sdk\Person\Enum\Gender', 'value'>")
     */
    public $gender;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $latitude;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $longitude;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $jobTitle;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $enabled;

    /**
     * @var AcceptLegalNoticeInputDto
     * @Serializer\Type("Sherl\Sdk\Person\Dto\AcceptLegalNoticeInputDto")
     */
    public $legalNotice;

    /**
     * @var AcceptPrivacyNoticeInputDto
     * @Serializer\Type("Sherl\Sdk\Person\Dto\AcceptPrivacyNoticeInputDto")
     */
    public $privacyNotice;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $createdAt;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $updatedAt;

    /**
     * @var ImageObjectDto
     * @Serializer\Type("Sherl\Sdk\Media\Dto\ImageObjectDto")
     */
    public $picture;

    /**
     * @var SettingsOutputDto
     * @Serializer\Type("Sherl\Sdk\Person\Dto\SettingsOutputDto")
     */
    public $settings;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $organizationFavorites;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $mangopayUserId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $mangopayWalletId;

    /**
     * @var MangopayCardOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Person\Dto\MangopayCardOutputDto>")
     */
    public $mangopayCards;

    /**
     * @var StripeOutputDto
     * @Serializer\Type("Sherl\Sdk\Person\Dto\StripeOutputDto")
     */
    public $stripe;

    /**
     * @var LemonwayOutputDto
     * @Serializer\Type("Sherl\Sdk\Person\Dto\LemonwayOutputDto")
     */
    public $lemonway;

    /**
     * @var PersonType
     * @Serializer\Type("enum<'Sherl\Sdk\Person\Enum\PersonType', 'value'>")
     */
    public $type;

    /**
     * @var FrequentedEstablishmentOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Person\Dto\FrequentedEstablishmentOutputDto>")
     */
    public $frequentedEstablishments;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $metadatas;

    /**
   * @var StatisticOutputDto
   * @Serializer\Type("string")
   */
    public $statistics;
}
