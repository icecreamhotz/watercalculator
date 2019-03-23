<?php
    class Paytypes extends CI_Model {

        public function paytypes_data() {
            $this->db->select('*');
            $this->db->from('paytypes');

            $query = $this->db->get();

            if($query->num_rows() > 0) {
                return $query->result();
            }
            
            return false;
        }

    }
?>