<?php
    class Migration_Add_New_Paytypess extends CI_Migration {
        public function up() {
            $this->dbforge->add_field(
                array(
                    'paytype_id' => array(
                        'type' => 'CHAR',
                        'constraint' => 36
                    ),
                    'paytype_name' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '30'
                    )
                )
            );

            $this->dbforge->add_key('paytype_id', TRUE);
            $this->dbforge->create_table('paytypes');
        }
        
        public function down() {
            $this->dbforge->drop_table('paytypes');
        }
    }
?>
