<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Shop\Product\Enum\ShopProductType;
use Sherl\Sdk\Shop\Category\Dto\PublicCategoryResponseDto;
use Sherl\Sdk\Shop\Product\Dto\OfferDto;
use Sherl\Sdk\Shop\Product\Dto\OptionDto;
use Sherl\Sdk\Media\Dto\ImageObjectOutputDto;

use DateTime;

use Sherl\Sdk\Shop\Discount\Dto\ProductRestrictionsWithProductUriDto;

class PublicProductResponseDto
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
   * @var ShopProductType
   * @Serializer\Type("Sherl\Sdk\Shop\Product\Dto\ShopProductType")
   */
  public $type;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $parentUri;

  /**
   * @var PublicProductResponseDto
   * @Serializer\Type("Sherl\Sdk\Shop\Product\Dto\PublicProductResponseDto")
   */
  public $parent;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $name;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $slug;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $slogan;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $description;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $categoryUri;

  /**
   * @var string[]
   * @Serializer\Type("array<string>")
   */
  public $categoryUris;

  /**
   * @var PublicCategoryResponseDto
   * @Serializer\Type("Sherl\Sdk\Shop\Category\Dto\PublicCategoryResponseDto")
   */
  public $category;

  /**
   * @var PublicCategoryResponseDto[]
   * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\PublicCategoryResponseDto>")
   */
  public $categories;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $isEnable;

  /**
   * @var array<OfferDto>
   * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\OfferDto>")
   */
  public $offers;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $metadatas;

  /**
   * @var OptionDto[]
   * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\OptionDto>")
   */
  public $options;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $organizationUri;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $isCustom;

  /**
   * @var ImageObjectOutputDto[]
   * @Serializer\Type("array<Sherl\Sdk\Media\Dto\ImageObjectOutputDto>")
   */
  public $photos;

  /**
   * @var ProductRestrictionsWithProductUriDto[]
   * @Serializer\Type(array<"Sherl\Sdk\Shop\Discount\Dto\ProductRestrictionsWithProductUriDto>")
   */
  public $restrictions;

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
}
