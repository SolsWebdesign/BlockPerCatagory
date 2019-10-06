<?php
/**
 * Save
 *
 * @copyright Copyright © 2019 Solswebdesign. All rights reserved.
 * @author    sols@solswebdesign.nl
 */

namespace Sols\BlockPerCategory\Controller\Adminhtml\Item;


class Delete extends \Magento\Backend\App\Action {

    protected $resultPageFactory = false;
    protected $bpcFactory;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    protected $productFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Sols\BlockPerCategory\Model\BlockpercategoryFactory $bpcFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->bpcFactory = $bpcFactory;

        parent::__construct($context);
    }

    public function execute()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            $model = $this->bpcFactory->create()->load($id);
            if ($model->getId() > 0) {
                $model->delete();

                $this->messageManager->addSuccess(__('Block per category item deleted.'));
            }
        }

        $this->getResponse()->setRedirect($this->_redirect->getRedirectUrl());
    }
}