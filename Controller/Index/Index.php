<?php
namespace Hans\Office\Controller\Index;

use Hans\Office\Model\DepartmentFactory;
use Hans\Office\Model\EmployeeFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @var DepartmentFactory
     */
    protected $departmentFactory;

    /**
     * @var EmployeeFactory
     */
    protected $employeeFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param DepartmentFactory $departmentFactory
     * @param EmployeeFactory $employeeFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        DepartmentFactory $departmentFactory,
        EmployeeFactory $employeeFactory
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->departmentFactory = $departmentFactory;
        $this->employeeFactory = $employeeFactory;
    }

    /**
     * Index Action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $department1 = $this->departmentFactory->create();
        $department1->setName('Finance')->save();

        $department2 = $this->departmentFactory->create();
        $department2->setName('Research')->save();

        $department3 = $this->departmentFactory->create();
        $department3->setName('Support')->save();

        //EAV model, creating new entities, flavour #1
        $employee1 = $this->employeeFactory->create();
        $employee1->setDepartment_id($department1->getId());
        $employee1->setEmail('goran@mail.loc');
        $employee1->setFirstName('Goran');
        $employee1->setLastName('Gorvat');
        $employee1->setServiceYears(3);
        $employee1->setDob('1984-04-18');
        $employee1->setSalary(3800.00);
        $employee1->setVatNumber('GB123451234');
        $employee1->setNote('Note #1');
        $employee1->save();

        //EAV model, creating new entities, flavour #2
        $employee2 = $this->employeeFactory->create();
        $employee2->setData('department_id', $department2->getId());
        $employee2->setData('email', 'marko@mail.loc');
        $employee2->setData('first_name', 'Marko');
        $employee2->setData('last_name', 'Tunukovic');
        $employee2->setData('service_years', 3);
        $employee2->setData('dob', '1984-04-18');
        $employee2->setData('salary', 3800.00);
        $employee2->setData('vat_number', 'GB123451234');
        $employee2->setData('note', 'Note #2');
        $employee2->save();

        //EAV model, creating new entities, flavour #3
        $employee3 = $this->employeeFactory->create();
        $employee3->setData([
            'department_id' => $department3->getId(),
            'email'         => 'ivan@mail.loc',
            'first_name'    => 'Ivan',
            'last_name'     => 'Telebar',
            'service_years' => 2,
            'dob'           => '1986-08-22',
            'salary'        => 2400.00,
            'vat_number'    => 'GB123454321',
            'note'          => 'Note #3'
        ]);
        $employee3->save();

        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->pageFactory->create();
        return $resultPage;
    }
}