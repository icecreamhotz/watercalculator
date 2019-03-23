<?php
    class Rates extends CI_Model {

        public function rate_active() {
            $this->db->select('*');
            $this->db->from('rates');
            $this->db->where('rate_status', 0);
            $this->db->join('paytypes', 'rates.paytype_id = paytypes.paytype_id', 'inner');
            $query = $this->db->get();

            if($query->num_rows() > 0) {
                return $query->result();
            }

            return false;
        }

        public function edit($rate_id, $data) {
            $this->db->set('rate_status', 1);
            $this->db->where('rate_id', $rate_id);
            $this->db->update('rates');

            if($this->db->affected_rows() > 0) {
                
                $this->db->set('rate_id', 'UUID()', FALSE);

                $this->db->insert('rates', $data);

                if($this->db->affected_rows() > 0 ) {
                    return true;
                }
                return false;
            }

            return false;
        }

    }
?>