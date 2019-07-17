<?php
namespace Hans\Office\Block\Catalog\Product;

class AbstractProductPlugin2
{
    /**
     * @var \Hans\Office\Model\Logger
     */
    protected $logger;

    /**
     * AbstractProductPlugin1 constructor.
     * @param \Hans\Office\Model\Logger $logger
     */
    public function __construct(
        \Hans\Office\Model\Logger $logger
    ) {
        $this->logger = $logger;
    }

    /**
     * @param \Magento\Catalog\Block\Product\AbstractProduct $subject
     * @param \Magento\Catalog\Model\Product $product
     * @param array $additional
     */
    public function beforeGetAddToCartUrl(
        $subject,
        $product,
        $additional = []
    ) {
        $this->logger->log('Plugin2 - beforeGetAddToCartUrl', null, 'plugin.log');
    }

    /**
     * @param \Magento\Catalog\Block\Product\AbstractProduct $subject
     * @param string $result
     * @return string
     */
    public function afterGetAddToCartUrl(
        $subject,
        $result
    ) {
        $this->logger->log('Plugin2 - afterGetAddToCartUrl', null, 'plugin.log');

        return $result;
    }

    /**
     * @param \Magento\Catalog\Block\Product\AbstractProduct $subject
     * @param \Closure $proceed
     * @param \Magento\Catalog\Model\Product $product
     * @param array $additional
     * @return string
     */
    public function aroundGetAddToCartUrl(
        $subject,
        \Closure $proceed,
        $product,
        $additional = []
    ) {
        $this->logger->log('Plugin2 - aroundGetAddToCartUrl', null, 'plugin.log');

        return $proceed($product, $additional);
    }
}