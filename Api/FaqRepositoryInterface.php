<?php

namespace Crealoz\Faq\Api;

use Crealoz\Faq\Api\Data\FaqInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface FaqRepositoryInterface
{
    /**
     * Save FAQ
     *
     * @param \Crealoz\Faq\Api\Data\FaqInterface $faq
     * @return \Crealoz\Faq\Api\Data\FaqInterface
     */
    public function save(FaqInterface $faq);

    /**
     * Get FAQ by ID
     *
     * @param int $faqId
     * @return \Crealoz\Faq\Api\Data\FaqInterface
     */
    public function getById($faqId);

    /**
     * Delete FAQ
     *
     * @param \Crealoz\Faq\Api\Data\FaqInterface $faq
     * @return bool true on success
     */
    public function delete(FaqInterface $faq);

    /**
     * Get list of FAQ based on criteria
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Crealoz\Faq\Api\Data\FaqSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
