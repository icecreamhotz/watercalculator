<?php
    class Villages extends CI_Model {

        public function villages_data() {
            $this->db->select('*');
            $this->db->from('villages');

            $query = $this->db->get();

            if($query->num_rows() > 0) {
                return $query->result();
            }
            
            return false;
        }

        public function villages_data_bill() {
            $this->db->select('
                v.*,  
                SUM(b.bill_metertotal) as bill_metertotal,
                p.paytype_name,
                r.rate_id,
                r.rate_price
            ', false);
            $this->db->from('villages as v');
            $this->db->join('bills as b', 'v.vil_id = b.vil_id', 'left');
            $this->db->join('paytypes as p', 'v.paytype_id = p.paytype_id');
            $this->db->join('rates as r', 'p.paytype_id = r.paytype_id');
            $this->db->group_by('v.vil_id');

            $query = $this->db->get();

            if($query->num_rows() > 0) {
                return $query->result();
            }

            return false;
        }

        public function insert($data) {
            $this->db->set('vil_id', 'UUID()', FALSE);

            $this->db->insert('villages', $data);
            if($this->db->affected_rows() > 0 ) {
                return true;
            }

            return false;
        }

        public function update($vil_id, $data) {
            $this->db->where('vil_id', $vil_id);
            $this->db->update('villages', $data);

            if($this->db->affected_rows() > 0) {
                return true;
            }

            return false;
        }

        public function delete($vil_id) {
            $this->db->where('vil_id', $vil_id);
            $this->db->delete('villages');

            if($this->db->affected_rows() > 0) {
                return true;
            }

            return false;
        }

    }
?>