<?php
namespace Hans\Office\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Collection extends Action
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @var \Hans\Office\Model\ResourceModel\Employee\CollectionFactory
     */
    protected $employeeCollectionFactory;

    /**
     * Collection constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param \Hans\Office\Model\ResourceModel\Employee\CollectionFactory $employeeCollectionFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        \Hans\Office\Model\ResourceModel\Employee\CollectionFactory $employeeCollectionFactory
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->employeeCollectionFactory = $employeeCollectionFactory;
    }

    /**Magento\Framework\ObjectManager\ObjectManager
     * Index Action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var \Hans\Office\Model\ResourceModel\Employee\Collection $collection */
        $collection = $this->employeeCollectionFactory->create();
        $collection->addAttributeToSelect('*');
//        $collection->addAttributeToFilter('service_years', 3);
//        $collection->addAttributeToFilter('salary', ['gteq' => 3800.00]);
        $collection->addAttributeToFilter('note', ['like' => '%Note%']);
        $collection->load();

        foreach ($collection as $employee) {
            var_dump($employee->getData());
        }

        exit;

        /** @var \Magento\Framework\View\Result\Page $resultPage */
//        $resultPage = $this->pageFactory->create();
//        return $resultPage;
    }
}