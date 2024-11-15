<?php

namespace Crealoz\Faq\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Index implements HttpGetActionInterface
{

    public function __construct(
        protected ResultFactory $resultFactory
    ) {
    }

    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $result->getConfig()->getTitle()->set(__('FAQ'));
        $result->getConfig()->setDescription(__('FAQ Page'));
        return $result;
    }
}
