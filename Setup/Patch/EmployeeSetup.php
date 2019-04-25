<?php
namespace Hans\Office\Setup\Patch;

use Hans\Office\Model\ResourceModel\Employee;
use Magento\Eav\Model\Entity\Attribute\Backend\Datetime;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

class EmployeeSetup extends EavSetup
{
//    const EMPLOYEE_ENTITY_TYPE_ID = 9;

    public function getDefaultEntities()
    {
        return [
            'hans_office_employee' => [
                'entity_model' => Employee::class,
                'table' => 'hans_office_employee_entity',
                'attributes' => [
                    'department_id' => [
                        'type' => 'static',
                        'label' => 'Departement ID',
                        'required' => false,
                        'sort_order' => 1,
                        'visible' => false,
                        'group' => 'General Information'
                    ],
                    'email' => [
                        'type' => 'static',
                        'label' => 'Email',
                        'required' => true,
                        'sort_order' => 2,
                        'visible' => true,
                        'group' => 'General Information'
                    ],
                    'firstname' => [
                        'type' => 'static',
                        'label' => 'Firstname',
                        'required' => true,
                        'sort_order' => 3,
                        'visible' => true,
                        'group' => 'General Information'
                    ],
                    'lastname' => [
                        'type' => 'static',
                        'label' => 'Lastname',
                        'required' => true,
                        'sort_order' => 4,
                        'visible' => true,
                        'group' => 'General Information'
                    ],
                    'service_years' => [
                        'type' => 'int',
                        'lable' => 'Service Years',
                        'input' => 'text',
                        'sort_order' => 5,
                        'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                        'group' => 'General Information'
                    ],
                    'dob' => [
                        'type' => 'datetime',
                        'lable' => 'Date Of Birth',
                        'input' => 'date',
                        'backend' => Datetime::class,
                        'sort_order' => 6,
                        'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                        'group' => 'General Information'
                    ],
                    'salary' => [
                        'type' => 'decimal',
                        'label' => 'Salary',
                        'input' => 'text',
                        'sort_order' => 7,
                        'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                        'group' => 'General Information'
                    ],
                    'vat_number' => [
                        'type' => 'varchar',
                        'label' => 'VAT Number',
                        'input' => 'text',
                        'sort_order' => 8,
                        'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                        'group' => 'General Information'
                    ],
                    'note' => [
                        'type' => 'text',
                        'lable' => 'Note',
                        'input' => 'textarea',
                        'sort_order' => 9,
                        'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                        'wysiwyg_enabled' => true,
                        'is_html_allowed_on_front' => true,
                        'group' => 'General Information'
                    ]
                ]
            ]
        ];
    }
}