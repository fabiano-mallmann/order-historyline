<?php
/**
 * Copyright © Magentando All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magentando\OrderHistoryLine\Model\ResourceModel\HistoryLine;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'historyline_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Magentando\OrderHistoryLine\Model\HistoryLine::class,
            \Magentando\OrderHistoryLine\Model\ResourceModel\HistoryLine::class
        );
    }
}

