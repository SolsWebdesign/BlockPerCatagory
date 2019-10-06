<?php
/**
 * Categoryspecial
 *
 * @copyright Copyright © 2019 Solswebdesign. All rights reserved.
 * @author    sols@solswebdesign.nl
 */
namespace Sols\BlockPerCategory\Block;

use Magento\Framework\View\Element\Template;

class Categoryspecial extends Template
{
    protected $registry;
    private $config;
    protected $collectionFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Sols\BlockPerCategory\Model\Config $config,
        \Sols\BlockPerCategory\Model\ResourceModel\Blockpercategory\CollectionFactory $collectionFactory,
        array $data = []
    )
    {
        $this->registry = $registry;
        $this->config = $config;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function getCurrentCategory()
    {
        return $this->registry->registry('current_category');
    }

    public function getParentId()
    {
        return $this->getCurrentCategory()->getParentId();
    }

    /* Get all parent categories ids  */
    public function getIdAndParentIds()
    {
        $allIds = [];
        $category = $this->registry->registry('current_category');
        if(isset($category)) {
            $allIds = $this->getCurrentCategory()->getParentIds();
            array_push($allIds, $category->getId());
        }
        return $allIds;
    }

    public function getDebugInfo()
    {
        if($this->config->isDebugEnabled()) {
            return true;
        } else {
            return false;
        }
    }

    public function getBlockIdForCategory()
    {
        if($this->config->isEnabled()) {
            // get category ids
            $allIds = $this->getIdAndParentIds();
            if (count($allIds) > 0) {
                $collection = $this->collectionFactory->create();
                $collection->addFieldToFilter('category_id', array('in' => $allIds));
                $collection->setOrder('category_id', 'DESC');
                $blockPerCategory = $collection->getFirstItem();
                if (isset($blockPerCategory)) {
                    return $blockPerCategory->getData('block_id');
                }
            }
        }
        return null;
    }
}