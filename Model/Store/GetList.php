<?php

declare(strict_types=1);

namespace Test\GraphQL\Model\Store;

use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Test\GraphQL\Model\ResourceModel\StoreCollection;
use Test\GraphQL\Model\ResourceModel\StoreCollectionFactory;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

class GetList
{
    /**
     * @var StoreCollectionFactory
     */
    private $storeCollectionFactory;
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * @var SearchResultsInterfaceFactory
     */
    private $storeSearchResultsInterfaceFactory;

    public function __construct(
        StoreCollectionFactory $storeCollectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SearchResultsInterfaceFactory $storeSearchResultsInterfaceFactory
    )
    {
        $this->storeCollectionFactory = $storeCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->storeSearchResultsInterfaceFactory = $storeSearchResultsInterfaceFactory;
    }

    /**
     * @param SearchCriteriaInterface|null $searchCriteria
     */
    public function execute(SearchCriteriaInterface $searchCriteria = null)
    {
        /** @var StoreCollection $storeCollection */
        $storeCollection = $this->storeCollectionFactory->create();

        if (null === $searchCriteria) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $storeCollection);
        }

        /** @var SearchResultsInterface $searchResult */
        $searchResult = $this->storeSearchResultsInterfaceFactory->create();
        $searchResult->setItems($storeCollection->getItems());
        $searchResult->setTotalCount($storeCollection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);
        return $searchResult;
    }
}
