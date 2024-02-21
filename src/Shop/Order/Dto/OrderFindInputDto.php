<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use Sherl\Sdk\Common\Dto\PaginationFiltersInputDto;


use Sherl\Sdk\Shop\Order\Enum\OrderStatus;
use Sherl\Sdk\Shop\Order\Enum\OrganizationServiceType;
use Sherl\Sdk\Shop\Order\Enum\OrganizationFilterByUsage;

use Sherl\Sdk\Shop\Product\Enum\ShopProductType;

class OrderFindInputDto extends PaginationFiltersInputDto
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var ShopProductType
     */
    public $type;

    /**
     * @var string
     */
    public $q;

    /**
     * @var string
     */
    public $date;

    /**
     * @var string
     */
    public $dateRangeMin;

    /**
     * @var string
     */
    public $dateRangeMax;

    /**
     * @var string
     */
    public $scheduleDateRangeMin;

    /**
     * @var string
     */
    public $scheduleDateRangeMax;

    /**
     * @var integer
     */
    public $orderNumber;

    /**
     * @var OrderStatus
     */
    public $orderStatus;

    /**
     * @var OrderStatus[]
     */
    public $orderStatusTab;

    /**
     * @var string
     */
    public $customerId;

    /**
     * @var string
     */
    public $customerName;

    /**
     * @var string
     */
    public $meansOfPayment;

    /**
     * @var OrganizationServiceType
     */
    public $serviceType;

    /**
     * @var float
     */
    public $amount;

    /**
     * @var OrganizationFilterByUsage
     */
    public $filterByUsage;

    /**
     * @var SortDto
     */
    public $sort;
}
