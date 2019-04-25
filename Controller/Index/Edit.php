<?php
namespace Hans\Office\Controller\Index;

use Hans\Office\Model\EmployeeFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Edit extends Action
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @var EmployeeFactory
     */
    protected $employeeFactory;

    /**
     * Edit constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param EmployeeFactory $employeeFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        EmployeeFactory $employeeFactory
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->employeeFactory = $employeeFactory;
    }

    /**
     * Index Action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $employee1 = $this->employeeFactory->create();
        $employee1->load(2);
        $employee1->setFirstname('Goran')
                  ->setLastname('Gorvat')
                  ->save();

        $employee2 = $this->employeeFactory->create();
        $employee2->load(3);
        $employee2->setFirstname('Marko')
                  ->setLastname('Tunukovic')
                  ->save();

        $employee3 = $this->employeeFactory->create();
        $employee3->load(4);
        $employee3->setFirstname('Ivan')
                  ->setLastname('Telebar')
                  ->save();

        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->pageFactory->create();
        return $resultPage;
    }
}