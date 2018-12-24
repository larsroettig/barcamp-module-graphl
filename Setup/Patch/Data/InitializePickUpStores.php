<?php
declare(strict_types=1);

namespace Test\GraphQL\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class InitializePickUpStores
 * @package Barcamp\Graphl\Setup\Patch\Data
 */
class InitializePickUpStores implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * EnableSegmentation constructor.
     *
     * @param SchemaSetupInterface $schemaSetup
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    )
    {

        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $connection = $this->moduleDataSetup->getConnection();


        $stores = [];

        for ($i = 1; $i <= 50; $i++) {
            $stores[] = [
                'Brick and Mortar ' . $i,
                'Test Street' . $i,
                $i * random_int(1, 100),
                $i * random_int(1000, 9999)
            ];


        }

        $connection->insertArray($connection->getTableName('pickup_stores'), [
            'name',
            'street',
            'street_num',
            'postcode'
        ],
            $stores
        );

        $this->moduleDataSetup->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}