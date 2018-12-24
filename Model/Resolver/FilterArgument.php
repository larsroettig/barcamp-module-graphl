<?php
declare(strict_types=1);

namespace Test\GraphQL\Model\Resolver;

use Magento\Framework\GraphQl\Query\Resolver\Argument\FieldEntityAttributesInterface;
use Magento\Framework\GraphQl\ConfigInterface;

class FilterArgument implements FieldEntityAttributesInterface
{
    /** @var ConfigInterface */
    private $config;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * Get the attributes for an entity
     *
     * @return array
     */
    public function getEntityAttributes(): array
    {
        $fields = [];
        /** @var \Magento\Framework\GraphQl\Config\Element\Field $field */
        foreach ($this->config->getConfigElement('PickUpStore')->getFields() as $field) {
            $fields[$field->getName()] = 'String';
        }

        return array_keys($fields);
    }
}
