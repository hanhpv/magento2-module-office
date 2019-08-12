<?php
namespace Hans\Office\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    public function isModuleOutputEnabled($moduleName = null)
    {
        return parent::isModuleOutputEnabled($moduleName);
    }
}