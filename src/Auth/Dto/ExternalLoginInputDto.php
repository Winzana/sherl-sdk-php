<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Auth\Dto\ExternalEmailInputDto;
use Sherl\Sdk\Auth\Dto\ExternalNameInputDto;
use Sherl\Sdk\Auth\Dto\ExternalPhotoInputDto;

class ExternalLoginInputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $displayName;

  /**
   * @var ExternalEmailInputDto
   * @Serializer\Type("Sherl\Sdk\Auth\Dto\ExternalEmailInputDto")
   */
  public $emails;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $id;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $locale;

  /**
   * @var ExternalNameInputDto
   * @Serializer\Type("Sherl\Sdk\Auth\Dto\ExternalNameInputDto")
   */
  public $name;

  /**
   * @var ExternalPhotoInputDto
   * @Serializer\Type("Sherl\Sdk\Auth\Dto\ExternalPhotoInputDto")
   */
  public $photos;
}
