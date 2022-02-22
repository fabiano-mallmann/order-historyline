<?php
/**
 * Copyright © Magentando All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magentando\OrderHistoryLine\Api\Data;

interface HistoryLineSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get HistoryLine list.
     * @return \Magentando\OrderHistoryLine\Api\Data\HistoryLineInterface[]
     */
    public function getItems();

    /**
     * Set description list.
     * @param \Magentando\OrderHistoryLine\Api\Data\HistoryLineInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

