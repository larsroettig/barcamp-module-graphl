<?php
declare(strict_types=1);

namespace Test\GraphQL\Model\Resolver;

use Magento\Framework\GraphQl\Query\Resolver\Argument\SearchCriteria\Builder as SearchCriteriaBuilder;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Test\GraphQL\Model\Store\GetList;


class Store implements ResolverInterface
{

    /**
     * @var GetList
     */
    private $getList;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * PickUpStoresList constructor.
     * @param GetList $getList
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(GetList $getList, SearchCriteriaBuilder $searchCriteriaBuilder)
    {
        $this->getList = $getList;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    )
    {
        $searchCriteria = $this->searchCriteriaBuilder->build('pickup_stores', $args);
        $searchCriteria->setCurrentPage($args['currentPage']);
        $searchCriteria->setPageSize($args['pageSize']);

        $searchResult = $this->getList->execute($searchCriteria);

        return [
            'total_count' => $searchResult->getTotalCount(),
            'items' => $searchResult->getItems()
        ];
    }
}