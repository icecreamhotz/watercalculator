<?php
    class Employees extends CI_Model {

        public function login($data) {
            $this->db->select('emp_username');
            $this->db->from('employees');
            $this->db->where('emp_username', $data['username']);
            $this->db->where('emp_password', $this->salt_pass($data['password']));
            $this->db->limit(1);

            $query = $this->db->get();
            
            if ($query->num_rows() == 1) {
                return true;
            }

            return false;
        }

        public function employee_data($column, $value) {
            $this->db->select('*');
            $this->db->from('employees');
            $this->db->where($column, $value);
            $this->db->limit(1);

            $query = $this->db->get();

            if($query->num_rows() == 1) {
                return $query->result();
            }
            
            return false;
        }

        public function salt_pass($password)
        {
            return md5($password);
        }

    }
?>