<?php
namespace Hans\Office\Model;

class Logger
{
    /**
     * Quick log
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