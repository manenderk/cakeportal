<?php
use Migrations\AbstractMigration;

class Initial1 extends AbstractMigration
{

    public $autoId = false;

    public function up()
    {

        $this->table('custom_field_choices')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('field_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('choice_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'field_id',
                ]
            )
            ->create();

        $this->table('custom_field_types')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('field_type', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('custom_field_values')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('record_id', 'biginteger', [
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('field_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('field_value', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'field_id',
                ]
            )
            ->create();

        $this->table('custom_fields')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('field_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('field_type_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('table_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'field_type_id',
                ]
            )
            ->create();

        $this->table('departments')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('department_name', 'string', [
                'default' => null,
                'limit' => 64,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created_by', 'biginteger', [
                'default' => null,
                'limit' => 20,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('modified_by', 'biginteger', [
                'default' => null,
                'limit' => 20,
                'null' => true,
                'signed' => false,
            ])
            ->create();

        $this->table('employees')
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('user', 'biginteger', [
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('employee_num', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('reporting_manager', 'biginteger', [
                'default' => null,
                'limit' => 20,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('job_title_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('department_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('is_active', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created_by', 'biginteger', [
                'default' => null,
                'limit' => 20,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('modified_by', 'biginteger', [
                'default' => null,
                'limit' => 20,
                'null' => true,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'user',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'department_id',
                ]
            )
            ->addIndex(
                [
                    'job_title_id',
                ]
            )
            ->create();

        $this->table('job_titles')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('job_title', 'string', [
                'default' => null,
                'limit' => 64,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created_by', 'biginteger', [
                'default' => null,
                'limit' => 20,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('modified_by', 'biginteger', [
                'default' => null,
                'limit' => 20,
                'null' => true,
                'signed' => false,
            ])
            ->create();

        $this->table('custom_field_choices')
            ->addForeignKey(
                'field_id',
                'custom_fields',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('custom_field_values')
            ->addForeignKey(
                'field_id',
                'custom_fields',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('custom_fields')
            ->addForeignKey(
                'field_type_id',
                'custom_field_types',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('employees')
            ->addForeignKey(
                'department_id',
                'departments',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'job_title_id',
                'job_titles',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('custom_field_choices')
            ->dropForeignKey(
                'field_id'
            )->save();

        $this->table('custom_field_values')
            ->dropForeignKey(
                'field_id'
            )->save();

        $this->table('custom_fields')
            ->dropForeignKey(
                'field_type_id'
            )->save();

        $this->table('employees')
            ->dropForeignKey(
                'department_id'
            )
            ->dropForeignKey(
                'job_title_id'
            )->save();

        $this->table('custom_field_choices')->drop()->save();
        $this->table('custom_field_types')->drop()->save();
        $this->table('custom_field_values')->drop()->save();
        $this->table('custom_fields')->drop()->save();
        $this->table('departments')->drop()->save();
        $this->table('employees')->drop()->save();
        $this->table('job_titles')->drop()->save();
    }
}
