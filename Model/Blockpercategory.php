<?php
/**
 * Blockpercategory
 *
 * @copyright Copyright © 2019 Solswebdesign. All rights reserved.
 * @author    sols@solswebdesign.nl
 */

namespace Sols\BlockPerCategory\Model;

class Blockpercategory extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'sols_block_per_category';

    protected $_cacheTag = 'sols_block_per_category';

    protected $_eventPrefix = 'sols_block_per_category';

    protected function _construct()
    {
        $this->_init('Sols\BlockPerCategory\Model\ResourceModel\Blockpercategory');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
