<?php
/**
 * Collection
 *
 * @copyright Copyright © 2019 Solswebdesign. All rights reserved.
 * @author    sols@solswebdesign.nl
 */

namespace Sols\BlockPerCategory\Model\ResourceModel\Blockpercategory;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Sols\BlockPerCategory\Model\Blockpercategory;
use Sols\BlockPerCategory\Model\ResourceModel\Blockpercategory as BlockpercategoryResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(Blockpercategory::class, BlockpercategoryResource::class);
    }

}