<?php
/**
 * Save
 *
 * @copyright Copyright © 2019 Solswebdesign. All rights reserved.
 * @author    sols@solswebdesign.nl
 */

namespace Sols\BlockPerCategory\Controller\Adminhtml\Item;

class Edit extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->getConfig()->getTitle()->prepend(__('Manage block per category'));
        return $resultPage;
    }

    protected function initPage($resultPage)
    {
        $resultPage->setActiveMenu('Sols_BlockPerCategory::sols')
            ->addBreadcrumb(__('Manage block per category'), __('Manage block per category'));

        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Sols_BlockPerCategory::sols');
    }
}
