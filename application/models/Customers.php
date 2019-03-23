<?php
    class Customers extends CI_Model {

        public function register($data) {
            $query = $this->check_username($data['cus_username']);

            if($query->num_rows() == 0) {
                $this->db->set('cus_id', 'UUID()', FALSE);

                $this->db->insert('customers', $data);
                if($this->db->affected_rows() > 0) {
                    return true;
                }
            }

            return false;
        }

        public function login($data) {

            $this->db->select('*');
            $this->db->from('customers');
            $this->db->where('cus_username', $data['username']);
            $this->db->where('cus_password', $this->salt_pass($data['password']));
            $this->db->limit(1);

            $query = $this->db->get();
            
            if ($query->num_rows() == 1) {
                return true;
            }

            return false;
        }

        public function profile_data($cus_id) {
            $this->db->select('*');
            $this->db->from('customers');
            $this->db->where('cus_id', $cus_id);
            $this->db->limit(1);

            $query = $this->db->get();

            if ($query->num_rows() == 1) {
                return $query->result();
            }
            
            return false;
        }

        public function customer_data($username) {
            $query = $this->check_username($username);

            if ($query->num_rows() == 1) {
                return $query->result();
            }
            
            return false;
        }

        public function check_username($username) {
            $this->db->select('cus_id');
            $this->db->from('customers');
            $this->db->where('cus_username', $username);
            $this->db->limit(1);
            $query = $this->db->get();
            
            return $query;
        }

        public function salt_pass($password)
        {
            return md5($password);
        }

    }
?>