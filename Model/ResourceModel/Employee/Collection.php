<?php

namespace Hans\Office\Model\ResourceModel\Employee;

class Collection extends \Magento\Eav\Model\Entity\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Hans\Office\Model\Employee::class,
            \Hans\Office\Model\ResourceModel\Employee::class
        );
    }
}