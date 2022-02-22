<?php
/**
 * Copyright © Magentando All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magentando\OrderHistoryLine\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface HistoryLineRepositoryInterface
{

    /**
     * Save HistoryLine
     * @param \Magentando\OrderHistoryLine\Api\Data\HistoryLineInterface $historyLine
     * @return \Magentando\OrderHistoryLine\Api\Data\HistoryLineInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Magentando\OrderHistoryLine\Api\Data\HistoryLineInterface $historyLine
    );

    /**
     * Retrieve HistoryLine
     * @param string $historylineId
     * @return \Magentando\OrderHistoryLine\Api\Data\HistoryLineInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($historylineId);

    /**
     * Retrieve HistoryLine matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magentando\OrderHistoryLine\Api\Data\HistoryLineSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete HistoryLine
     * @param \Magentando\OrderHistoryLine\Api\Data\HistoryLineInterface $historyLine
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Magentando\OrderHistoryLine\Api\Data\HistoryLineInterface $historyLine
    );

    /**
     * Delete HistoryLine by ID
     * @param string $historylineId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($historylineId);
}

