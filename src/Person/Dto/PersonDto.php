<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Dto\AddressDto;
use Sherl\Sdk\Person\Dto\PersonOrganizationCreateDto;
use Sherl\Sdk\Person\Dto\AcceptLegalNoticeDto;
use Sherl\Sdk\Person\Dto\AcceptPrivacyNoticeDto;
use Sherl\Sdk\Person\Dto\MangopayCardOutputDto;
use Sherl\Sdk\Person\Dto\StripeOutputDto;
use Sherl\Sdk\Person\Dto\FrequentedEstablishmentOutputDto;
use Sherl\Sdk\Person\Dto\SettingsOutputDto;
use Sherl\Sdk\Person\Dto\StatisticOutputDto;

use Sherl\Sdk\Media\Dto\ImageObjectDto;

use Sherl\Sdk\Place\Dto\GeoCoordinatesDto;

use Sherl\Sdk\Person\Enum\Gender;
use Sherl\Sdk\Person\Enum\PersonType;

class PersonDto {

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
   * @var AddressDto
   * @Serializer\Type("Sherl\Sdk\Person\Dto\AddressDto")
   */
  public $address;

  /**
   * @var AddressDto[]
   * @Serializer\Type("array<Sherl\Sdk\Person\Dto\AddressDto>")
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
   * @var PersonOrganizationCreateDto
   * @Serializer\Type("Sherl\Sdk\Person\Dto\PersonOrganizationCreateDto")
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
   * @Serializer\Type("Sherl\Sdk\Person\Enum\Gender")
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
   * @var AcceptLegalNoticeDto
   * @Serializer\Type("Sherl\Sdk\Person\Dto\AcceptLegalNoticeDto")
   */
  public $legalNotice;

  /**
   * @var AcceptPrivacyNoticeDto
   * @Serializer\Type("Sherl\Sdk\Person\Dto\AcceptPrivacyNoticeDto")
   */
  public $privacyNotice;

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
   * @var MangopayCardOutputDto
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
   * @Serializer\Type("Sherl\Sdk\Person\Enum\PersonType")
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