<?php
    class Migration_Add_New_Villages extends CI_Migration {
        public function up() {
            $this->dbforge->add_field(
                array(
                    'vil_id' => array(
                        'type' => 'CHAR',
                        'constraint' => 36
                    ),
                    'vil_homenumber' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 10
                    ),
                    'vil_name' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 30,
                    ),
                    'vil_lastname' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 30,
                    ),
                    'vil_telephone' => array(
                        'type' => 'CHAR',
                        'constraint' => 10
                    ),
                    'paytype_id' => array(
                        'type' => 'CHAR',
                        'constraint' => 36
                    ),
                    'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                    'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                )
            );

            $this->dbforge->add_key('vil_id', TRUE);
            $this->dbforge->create_table('villages');

            $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (paytype_id) REFERENCES paytypes(paytype_id)');

            $this->dbforge->add_column('villages',[
                'CONSTRAINT paytype_village_id FOREIGN KEY(paytype_id) REFERENCES paytypes(paytype_id)',
            ]);
        }
        
        public function down() {
            $this->dbforge->drop_table('villages');
        }
    }
?>
