<?php

namespace Crealoz\Faq\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface FaqSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get list of FAQ items
     *
     * @return \Crealoz\Faq\Api\Data\FaqInterface[]
     */
    public function getItems();

    /**
     * Set list of FAQ items
     *
     * @param \Crealoz\Faq\Api\Data\FaqInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
