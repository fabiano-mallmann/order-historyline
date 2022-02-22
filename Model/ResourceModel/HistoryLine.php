<?php
/**
 * Copyright © Magentando All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magentando\OrderHistoryLine\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class HistoryLine extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('magentando_orderhistoryline_historyline', 'historyline_id');
    }
}

