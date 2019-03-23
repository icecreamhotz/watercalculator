<?php
    class Migration_Add_New_Bills extends CI_Migration {
        public function up() {
            $this->dbforge->add_field(
                array(
                    'bill_id' => array(
                        'type' => 'CHAR',
                        'constraint' => 36
                    ),
                    'bill_metertotal' => array(
                        'type' => 'INT',
                        'constraint' => 6,
                    ),
                    'rate_id' => array(
                        'type' => 'CHAR',
                        'constraint' => 36
                    ),
                    'vil_id' => array(
                        'type' => 'CHAR',
                        'constraint' => 36
                    ),
                    'emp_id' => array(
                        'type' => 'CHAR',
                        'constraint' => 36
                    ),
                    'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                )
            );

            $this->dbforge->add_key('bill_id', TRUE);
            $this->dbforge->create_table('bills');

            $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (vil_id) REFERENCES villages(vil_id)');

            $this->dbforge->add_column('bills',[
                'CONSTRAINT village_bill_id FOREIGN KEY(vil_id) REFERENCES villages(vil_id)',
            ]);

            $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (emp_id) REFERENCES employees(emp_id)');

            $this->dbforge->add_column('bills',[
                'CONSTRAINT employee_bill_id FOREIGN KEY(emp_id) REFERENCES employees(emp_id)',
            ]);

            $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (rate_id) REFERENCES rates(rate_id)');

            $this->dbforge->add_column('bills',[
                'CONSTRAINT rate_bill_id FOREIGN KEY(rate_id) REFERENCES rates(rate_id)',
            ]);
        }
        
        public function down() {
            $this->dbforge->drop_table('bills');
        }
    }
?>
