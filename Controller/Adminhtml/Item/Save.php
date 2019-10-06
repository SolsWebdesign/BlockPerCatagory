<?php
/**
 * Save
 *
 * @copyright Copyright © 2019 Solswebdesign. All rights reserved.
 * @author    sols@solswebdesign.nl
 */

namespace Sols\BlockPerCategory\Controller\Adminhtml\Item;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Sols\BlockPerCategory\Model\BlockpercategoryFactory;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    protected $bpcFactory;

    public function __construct(
        Action\Context $context,
        BlockpercategoryFactory $bpcFactory)
    {
        $this->bpcFactory = $bpcFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if($data) {
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $blockPerCategory = $this->bpcFactory->create()->load($id);
                $blockPerCategory->setData($data);
            } else {
                $blockPerCategory = $this->bpcFactory->create();
                $blockPerCategory->setName($data['name']);
                $blockPerCategory->setBlockId((int)$data['block_id']);
                $blockPerCategory->setCategoryId((int)$data['category_id']);
            }
        }
        try {
            $blockPerCategory->save();
            $this->messageManager->addSuccess(__('You saved the block per category item.'));
        } catch (LocalizedException $e) {
            $this->messageManager->addError($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addException($e, __('Something went wrong while saving the product.'));
        }
//        $this->bpcFactory->create()
//            ->setData($this->getRequest()->getPostValue())
//            ->save();
        return $this->resultRedirectFactory->create()->setPath('sols/index/index');
    }
}