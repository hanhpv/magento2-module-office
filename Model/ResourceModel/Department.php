<?php

namespace Hans\Office\Model\ResourceModel;

class Department extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('hans_office_department', 'entity_id');
    }
}