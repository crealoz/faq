<?php

namespace Crealoz\Faq\Model;

use Crealoz\Faq\Api\FaqRepositoryInterface;
use Crealoz\Faq\Api\Data\FaqInterface;
use Crealoz\Faq\Api\Data\FaqSearchResultsInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\CouldNotDeleteException;

class FaqRepository implements FaqRepositoryInterface
{
    protected $resource;
    protected $faqFactory;
    protected $faqCollectionFactory;
    protected $searchResultsFactory;
    protected $collectionProcessor;

    public function __construct(
        \Crealoz\Faq\Model\ResourceModel\Faq $resource,
        \Crealoz\Faq\Model\FaqFactory $faqFactory,
        \Crealoz\Faq\Model\ResourceModel\Faq\CollectionFactory $faqCollectionFactory,
        FaqSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->faqFactory = $faqFactory;
        $this->faqCollectionFactory = $faqCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function save(FaqInterface $faq)
    {
        try {
            $this->resource->save($faq);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__("Could not save the FAQ: %1", $exception->getMessage()));
        }
        return $faq;
    }

    public function getById($faqId)
    {
        $faq = $this->faqFactory->create();
        $this->resource->load($faq, $faqId);
        if (!$faq->getId()) {
            throw new NoSuchEntityException(__('FAQ with id "%1" does not exist.', $faqId));
        }
        return $faq;
    }

    public function delete(FaqInterface $faq)
    {
        try {
            $this->resource->delete($faq);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__("Could not delete the FAQ: %1", $exception->getMessage()));
        }
        return true;
    }

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->faqCollectionFactory->create();
        $searchResults = $this->searchResultsFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }
}
