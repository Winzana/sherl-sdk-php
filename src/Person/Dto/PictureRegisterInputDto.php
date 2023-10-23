<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

class PictureRegisterInputDto {

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $person;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $mediaId;

  /**
   * @var string
   * @Serializer\Type("string") // TODO: check in Php if is string to compare
   */
  public $file;

}