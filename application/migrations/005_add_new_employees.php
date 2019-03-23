<?php
    class Migration_Add_New_Employees extends CI_Migration {
        public function up() {
            $this->dbforge->add_field(
                array(
                    'emp_id' => array(
                        'type' => 'CHAR',
                        'constraint' => 36
                    ),
                    'emp_username' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 30
                    ),
                    'emp_password' => array(
                        'type' => 'CHAR',
                        'constraint' => 80,
                    ),
                    'emp_name' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 30
                    ),
                    'emp_lastname' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 30
                    ),
                    'emptype_id' => array(
                        'type' => 'CHAR',
                        'constraint' => 36
                    ),
                    'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                    'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                )
            );

            $this->dbforge->add_key('emp_id', TRUE);
            $this->dbforge->create_table('employees');

            $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (emptype_id) REFERENCES emptypes(emptype_id)');

            $this->dbforge->add_column('employees',[
                'CONSTRAINT emptypes_employee_id FOREIGN KEY(emptype_id) REFERENCES emptypes(emptype_id)',
            ]);
        }
        
        public function down() {
            $this->dbforge->drop_table('employees');
        }
    }
?>
