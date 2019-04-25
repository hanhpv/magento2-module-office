<?php
namespace Hans\Office\Setup\Patch\Data;

use Hans\Office\Setup\Patch\EmployeeSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;

class InstallDefaultAttributes implements DataPatchInterface, PatchVersionInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var EmployeeSetupFactory
     */
    private $employeeSetupFactory;

    /**
     * InstallDefaultAttributes constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EmployeeSetupFactory $employeeSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EmployeeSetupFactory $employeeSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->employeeSetupFactory = $employeeSetupFactory;
    }

    public function apply()
    {
        /** @var \Hans\Office\Setup\Patch\EmployeeSetup $employeeSetup */
        $employeeSetup = $this->employeeSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $employeeSetup->installEntities();
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getVersion()
    {
        return '1.0.0';
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}