<?php
/**
 * Copyright © Magentando All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magentando\OrderHistoryLine\Api\Data;

interface HistoryLineInterface
{

    const DESCRIPTION = 'description';
    const HISTORYLINE_ID = 'historyline_id';

    /**
     * Get historyline_id
     * @return string|null
     */
    public function getHistorylineId();

    /**
     * Set historyline_id
     * @param string $historylineId
     * @return \Magentando\OrderHistoryLine\HistoryLine\Api\Data\HistoryLineInterface
     */
    public function setHistorylineId($historylineId);

    /**
     * Get description
     * @return string|null
     */
    public function getDescription();

    /**
     * Set description
     * @param string $description
     * @return \Magentando\OrderHistoryLine\HistoryLine\Api\Data\HistoryLineInterface
     */
    public function setDescription($description);
}

