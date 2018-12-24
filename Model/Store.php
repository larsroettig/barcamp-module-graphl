<?php

declare(strict_types=1);

namespace Test\GraphQL\Model;

use Test\GraphQL\Model\ResourceModel\Store as StoreResourceModel;
use Magento\Framework\Model\AbstractExtensibleModel;

/**
 * Class Store
 * @package Barcamp\Graphl\Model
 */
class Store extends AbstractExtensibleModel
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(StoreResourceModel::class);
    }
}