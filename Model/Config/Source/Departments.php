<?php
namespace Hans\Office\Model\Config\Source;

class Departments implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \Hans\Office\Model\ResourceModel\Department\CollectionFactory
     */
    protected $departmentCollectionFactory;

    /**
     * Departments constructor.
     * @param \Hans\Office\Model\ResourceModel\Department\CollectionFactory $departmentCollectionFactory
     */
    public function __construct(\Hans\Office\Model\ResourceModel\Department\CollectionFactory $departmentCollectionFactory)
    {
        $this->departmentCollectionFactory = $departmentCollectionFactory;
    }

    public function toOptionArray()
    {
        /** @var \Hans\Office\Model\ResourceModel\Department\Collection $departments */
        $departments = $this->departmentCollectionFactory->create();

        return $departments->toOptionArray();
    }
}