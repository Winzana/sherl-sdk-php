<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class ShopOrderRefundDto
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
    public $productionId;
    /**
     * @var float
     * @Serializer\Type("float")
  */
    public $amount;
    /**
     * @var string
     * @Serializer\Type("string")
  */
    public $askedBy;
    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
  */
    public $createdAt;
    /**
     * @var mixed
     * @Serializer\Type("mixed")
  */
    public $metadatas;

}
