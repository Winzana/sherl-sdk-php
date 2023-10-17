<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Person\Dto\FrequentedEstablishmentOutputDto;
use Sherl\Sdk\Person\Dto\StatisticOutputDto;
use Sherl\Sdk\Person\Dto\LemonwayOutputDto;
use Sherl\Sdk\Person\Dto\StripeOutputDto;
use Sherl\Sdk\Person\Dto\MangopayCardOutputDto;
use Sherl\Sdk\Person\Dto\SettingsOutputDto;

use Sherl\Sdk\Place\Dto\AddressOutputDto;
use Sherl\Sdk\Place\Dto\PlaceOutputDto;

use Sherl\Sdk\Person\Enum\PersonType;
use Sherl\Sdk\Person\Enum\Gender;

class PersonOutputDto
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
  public $userId;

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
   * @var PlaceOutputDto
   * @Serializer\Type("Sherl\Sdk\Place\Dto\PlaceOutputDto")
   */
  public $address;

  /**
   * @var PlaceOutputDto[]
   * @Serializer\Type("array<Sherl\Sdk\Place\Dto\PlaceOutputDto>")
   */
  public $myAddresses;

  /**
   * @var AddressOutputDto
   * @Serializer\Type("Sherl\Sdk\Place\Dto\AddressOutputDto")
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

  // affiliation: IOrganizationResponse;

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
   * @var LegalNoticeAcceptanceOutputDto
   * @Serializer\Type("Sherl\Sdk\Person\Dto\LegalNoticeAcceptanceOutputDto")
   */
  public $legalNotice;

  /**
   * @var LegalNoticeAcceptanceOutputDto
   * @Serializer\Type("Sherl\Sdk\Person\Dto\LegalNoticeAcceptanceOutputDto")
   */
  public $privacyPolicy;

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

  // picture: IImageObject;

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
   * @var array
   * @Serializer\Type("array")
   */
  public $metadatas;

  /**
   * @var StatisticOutputDto
   * @Serializer\Type("Sherl\Sdk\Person\Dto\StatisticOutputDto")
   */
  public $statistics;
}
