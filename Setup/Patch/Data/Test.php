<?php
namespace Hans\Office\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;

class Test implements DataPatchInterface
{
    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $this->log('Test patch applied!', null, 'hans.log');
    }

    /**
     * Logs a message for the subscription task.
     *
     * @param string $msg
     * @param mixed $level
     * @param string $fileName
     *
     * @return void
     */
    public function log($msg, $level, $fileName)
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/' . $fileName);
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info($msg);
    }
}