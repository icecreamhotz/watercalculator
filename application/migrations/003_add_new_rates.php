<?php
    class Migration_Add_New_Rates extends CI_Migration {
        public function up() {
            $this->dbforge->add_field(
                array(
                    'rate_id' => array(
                        'type' => 'CHAR',
                        'constraint' => 36
                    ),
                    'rate_price' => array(
                        'type' => 'DECIMAL',
                        'constraint' => '6,2'
                    ),
                    'rate_status' => array(
                        'type' => 'SMALLINT',
                        'default' => 0,
                        'constraint' => 1,
                    ),
                    'paytype_id' => array(
                        'type' => 'CHAR',
                        'constraint' => 36
                    ),
                    'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                    'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                )
            );

            $this->dbforge->add_key('rate_id', TRUE);
            $this->dbforge->create_table('rates');

            $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (paytype_id) REFERENCES paytypes(paytype_id)');

            $this->dbforge->add_column('rates',[
                'CONSTRAINT paytype_rates_id FOREIGN KEY(paytype_id) REFERENCES paytypes(paytype_id)',
            ]);
        }
        
        public function down() {
            $this->dbforge->drop_table('rates');
        }
    }
?>
