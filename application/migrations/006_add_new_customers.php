<?php
    class Migration_Add_New_Customers extends CI_Migration {
        public function up() {
            $this->dbforge->add_field(
                array(
                    'cus_id' => array(
                        'type' => 'CHAR',
                        'constraint' => 36
                    ),
                    'cus_username' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 30
                    ),
                    'cus_password' => array(
                        'type' => 'CHAR',
                        'constraint' => 80
                    ),
                    'cus_name' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 30
                    ),
                    'cus_lastname' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 30
                    ),
                    'vil_id' => array(
                        'type' => 'CHAR',
                        'constraint' => 36,
                        'default' => NULL,
                        'null' => TRUE
                    ),
                    'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                    'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                )
            );



            $this->dbforge->add_key('cus_id', TRUE);
            $this->dbforge->create_table('customers');

            $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (vil_id) REFERENCES villages(vil_id)');

            $this->dbforge->add_column('customers',[
                'CONSTRAINT village_customer_id FOREIGN KEY(vil_id) REFERENCES villages(vil_id)',
            ]);
        }
        
        public function down() {
            $this->dbforge->drop_table('customers');
        }
    }
?>
