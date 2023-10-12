<?php

namespace Sherl\Sdk\Place\Dto;

use JMS\Serializer\Annotation as Serializer;

class AddressOutputDto {

    /**
   * @var string
   * @Serializer\Type("string")
   */
  public $id;
  
    /**
   * @var string
   * @Serializer\Type("string")
   */
  public $country;

    /**
   * @var string
   * @Serializer\Type("string")
   */
  public $locality;

    /**
   * @var string
   * @Serializer\Type("string")
   */
  public $region;

    /**
   * @var string
   * @Serializer\Type("string")
   */
  public $department;

    /**
   * @var string[]
   * @Serializer\Type("array<string>")
   */
  public $types;

    /**
   * @var string
   * @Serializer\Type("string")
   */
  public $postalCode;

    /**
   * @var string
   * @Serializer\Type("string")
   */
  public $streetAddress;

    /**
   * @var string
   * @Serializer\Type("string")
   */
  public $complementaryStreetAddress;

    /**
   * @var string
   * @Serializer\Type("string")
   */
  public $name;

    /**
   * @var string
   * @Serializer\Type("string")
   */
  public $type;

    /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $isDefault;

    /**
   * @var string
   * @Serializer\Type("string")
   */
  public $googleToken;

    /**
   * @var string
   * @Serializer\Type("string")
   */
  public $uri;

    /**
   * @var string
   * @Serializer\Type("string")
   */
  public $originId;

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
}