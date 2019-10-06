<?php

namespace Sols\BlockPerCategory\Model;

use Sols\BlockPerCategory\Api\BlockpercategoryRepositoryInterface;
use Sols\BlockPerCategory\Model\ResourceModel\Blockpercategory\CollectionFactory;

class BlockpercategoryRepository implements BlockpercategoryRepositoryInterface
{
    private $collectionFactory;

    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }
}
