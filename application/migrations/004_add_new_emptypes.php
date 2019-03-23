<?php
    class Migration_Add_New_Emptypes extends CI_Migration {
        public function up() {
            $this->dbforge->add_field(
                array(
                    'emptype_id' => array(
                        'type' => 'CHAR',
                        'constraint' => 36
                    ),
                    'emptype_name' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '20'
                    )
                )
            );

            $this->dbforge->add_key('emptype_id', TRUE);
            $this->dbforge->create_table('emptypes');
        }
        
        public function down() {
            $this->dbforge->drop_table('emptypes');
        }
    }
?>
