<?php

namespace Crealoz\Faq\Model\ResourceModel\Faq;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Crealoz\Faq\Model\Faq;
use Crealoz\Faq\Model\ResourceModel\Faq as FaqResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Faq::class, FaqResource::class);
    }
}
