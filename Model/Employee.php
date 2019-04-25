<?php

namespace Hans\Office\Model;

class Employee extends \Magento\Framework\Model\AbstractModel
{
    const ENTITY = 'hans_office_employee';

    protected function _construct()
    {
        $this->_init(\Hans\Office\Model\ResourceModel\Employee::class);
    }
}