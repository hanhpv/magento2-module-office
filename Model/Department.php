<?php

namespace Hans\Office\Model;

class Department extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Hans\Office\Model\ResourceModel\Department::class);
    }
}