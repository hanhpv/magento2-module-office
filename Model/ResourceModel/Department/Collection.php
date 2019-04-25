<?php

namespace Hans\Office\Model\ResourceModel\Department;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Hans\Office\Model\Department::class,
            \Hans\Office\Model\ResourceModel\Department::class
        );
    }
}