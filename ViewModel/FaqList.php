<?php

namespace Crealoz\Faq\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Crealoz\Faq\Model\ResourceModel\Faq\CollectionFactory;

class FaqList implements ArgumentInterface
{
    protected $faqCollectionFactory;

    public function __construct(
        CollectionFactory $faqCollectionFactory
    ) {
        $this->faqCollectionFactory = $faqCollectionFactory;
    }

    public function getFaqCollection()
    {
        $collection = $this->faqCollectionFactory->create();
        $collection->addFieldToFilter('is_active', 1);
        return $collection;
    }
}
