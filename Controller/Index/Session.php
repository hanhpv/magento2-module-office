<?php
namespace Hans\Office\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Session extends Action
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @var \Hans\Office\Model\Session
     */
    protected $session;

    /**
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        \Hans\Office\Model\Session $session
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->session = $session;
    }

    /**
     * Index Action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $this->session->setCurrentSongName('Một triệu khả năng');

        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->pageFactory->create();
        return $resultPage;
    }
}