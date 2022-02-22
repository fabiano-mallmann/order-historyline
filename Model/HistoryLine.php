<?php
/**
 * Copyright © Magentando All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magentando\OrderHistoryLine\Model;

use Magentando\OrderHistoryLine\Api\Data\HistoryLineInterface;
use Magento\Framework\Model\AbstractModel;

class HistoryLine extends AbstractModel implements HistoryLineInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Magentando\OrderHistoryLine\Model\ResourceModel\HistoryLine::class);
    }

    /**
     * @inheritDoc
     */
    public function getHistorylineId()
    {
        return $this->getData(self::HISTORYLINE_ID);
    }

    /**
     * @inheritDoc
     */
    public function setHistorylineId($historylineId)
    {
        return $this->setData(self::HISTORYLINE_ID, $historylineId);
    }

    /**
     * @inheritDoc
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }
}

