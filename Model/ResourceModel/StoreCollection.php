<?php
declare(strict_types=1);

namespace Test\GraphQL\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Test\GraphQL\Model\ResourceModel\Store as StoreResourceModel;
use Test\GraphQL\Model\Store as StoreModel;

/**
 * Class StoreCollection
 * @package Magento\Inventory\Model\ResourceModel\Stock
 */
class StoreCollection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(StoreModel::class, StoreResourceModel::class);
    }
}
