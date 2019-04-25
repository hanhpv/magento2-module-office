<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Hans\Office\Setup\Patch\Data;

use Hans\Office\Model\DepartmentFactory;
use Hans\Office\Model\EmployeeFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Patch is mechanism, that allows to do atomic upgrade data changes
 */
class InstallDefaultEmployees implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface $moduleDataSetup
     */
    private $moduleDataSetup;

    /**
     * @var DepartmentFactory\
     */
    private $departmentFactory;

    /**
     * @var EmployeeFactory
     */
    private $employeeFactory;

    /**
     * InstallDefaultEmployees constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param DepartmentFactory $departmentFactory
     * @param EmployeeFactory $employeeFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        DepartmentFactory $departmentFactory,
        EmployeeFactory $employeeFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->departmentFactory = $departmentFactory;
        $this->employeeFactory = $employeeFactory;
    }

    /**
     * Do Upgrade
     *
     * @return void
     */
    public function apply()
    {
        $itDepartment = $this->departmentFactory->create();
        $itDepartment->setName('IT');
        $itDepartment->save();

        $employee = $this->employeeFactory->create();
        $employee->setDepartmentId($itDepartment->getId())
                 ->setEmail('hans@dtn.com.vn')
                 ->setFirstname('Hans')
                 ->setLastname('Phung')
                 ->setServiceYears(3)
                 ->setDob('1988-02-07')
                 ->setSalary(1100.00)
                 ->setVatNumber('GB123456789')
                 ->setNote('Yêu màu tím, thích màu hường');

        $employee->save();
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [
            InstallDefaultAttributes::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [

        ];
    }
}
