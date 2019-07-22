<?php
namespace Hans\Office\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Message extends Action
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    /**
     * Index Action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->pageFactory->create();

        $this->messageManager->addSuccessMessage('Success-1');
        $this->messageManager->addSuccessMessage('Success-2');
        $this->messageManager->addNoticeMessage('Notice-1');
        $this->messageManager->addNoticeMessage('Notice-2');
        $this->messageManager->addWarningMessage('Warning-1');
        $this->messageManager->addWarningMessage('Warning-2');
        $this->messageManager->addErrorMessage('Error-1');
        $this->messageManager->addErrorMessage('Error-2');

        return $resultPage;
    }
}