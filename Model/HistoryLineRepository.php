<?php
/**
 * Copyright © Magentando All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magentando\OrderHistoryLine\Model;

use Magentando\OrderHistoryLine\Api\Data\HistoryLineInterface;
use Magentando\OrderHistoryLine\Api\Data\HistoryLineInterfaceFactory;
use Magentando\OrderHistoryLine\Api\Data\HistoryLineSearchResultsInterfaceFactory;
use Magentando\OrderHistoryLine\Api\HistoryLineRepositoryInterface;
use Magentando\OrderHistoryLine\Model\ResourceModel\HistoryLine as ResourceHistoryLine;
use Magentando\OrderHistoryLine\Model\ResourceModel\HistoryLine\CollectionFactory as HistoryLineCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class HistoryLineRepository implements HistoryLineRepositoryInterface
{

    /**
     * @var ResourceHistoryLine
     */
    protected $resource;

    /**
     * @var HistoryLineInterfaceFactory
     */
    protected $historyLineFactory;

    /**
     * @var HistoryLineCollectionFactory
     */
    protected $historyLineCollectionFactory;

    /**
     * @var HistoryLine
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceHistoryLine $resource
     * @param HistoryLineInterfaceFactory $historyLineFactory
     * @param HistoryLineCollectionFactory $historyLineCollectionFactory
     * @param HistoryLineSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceHistoryLine $resource,
        HistoryLineInterfaceFactory $historyLineFactory,
        HistoryLineCollectionFactory $historyLineCollectionFactory,
        HistoryLineSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->historyLineFactory = $historyLineFactory;
        $this->historyLineCollectionFactory = $historyLineCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(HistoryLineInterface $historyLine)
    {
        try {
            $this->resource->save($historyLine);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the historyLine: %1',
                $exception->getMessage()
            ));
        }
        return $historyLine;
    }

    /**
     * @inheritDoc
     */
    public function get($historyLineId)
    {
        $historyLine = $this->historyLineFactory->create();
        $this->resource->load($historyLine, $historyLineId);
        if (!$historyLine->getId()) {
            throw new NoSuchEntityException(__('HistoryLine with id "%1" does not exist.', $historyLineId));
        }
        return $historyLine;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->historyLineCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(HistoryLineInterface $historyLine)
    {
        try {
            $historyLineModel = $this->historyLineFactory->create();
            $this->resource->load($historyLineModel, $historyLine->getHistorylineId());
            $this->resource->delete($historyLineModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the HistoryLine: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($historyLineId)
    {
        return $this->delete($this->get($historyLineId));
    }
}

