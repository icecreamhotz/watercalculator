<?php
    class Bills extends CI_Model {

        public function bill_data() {
            $this->db->select('
                b.*,  
                (select sum(bill_metertotal) from bills where vil_id = b.vil_id and created_at <= b.created_at) - b.bill_metertotal as metertotal,
                v.vil_name,
                v.vil_lastname,
                v.vil_telephone,
                v.paytype_id,
                p.paytype_name,
                r.rate_price,
                e.emp_name,
                e.emp_lastname,
                v.vil_homenumber,
                (select count(*) from bills where vil_id = b.vil_id) as recordTotal
            ', false);
            $this->db->from('bills as b');
            $this->db->join('villages as v', 'b.vil_id = v.vil_id', 'left');
            $this->db->join('paytypes as p', 'v.paytype_id = p.paytype_id', 'left');
            $this->db->join('rates as r', 'b.rate_id = r.rate_id', 'left');
            $this->db->join('employees as e', 'b.emp_id = e.emp_id', 'left');
            $this->db->order_by('created_at','ASC');

            $query = $this->db->get();

            if($query->num_rows() > 0) {
                return $query->result();
            }

            return false;
        }

        public function insert($data) {
            $this->db->set('bill_id', 'UUID()', FALSE);

            $this->db->insert('bills', $data);
            if($this->db->affected_rows() > 0 ) {
                return true;
            }

            return false;
        }

    }
?>