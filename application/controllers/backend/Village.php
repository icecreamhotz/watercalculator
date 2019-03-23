
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Village extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->helper('form');

            $this->load->library('session');

            $this->load->model('Villages');
            $this->load->model('Paytypes');
            $this->load->model('Employees');
        }

        public function village_admin_view() {
            $data['villages'] = $this->Villages->villages_data();
            $data['paytypes'] = $this->Paytypes->paytypes_data();
            $data['content'] = $this->load->view('admin/backend/village', $data, true);
            $data['title'] = 'Village';
            $data['employee'] = $this->Employees->employee_data('emp_id', $this->session->userdata['employees']['emp_id']);
            $this->load->view('admin/auth/layout', $data);
        }

        public function insert() {
            $data = array(
                'vil_homenumber' => $this->input->post('vil_homenumber'),
                'vil_name' => $this->input->post('vil_name'),
                'vil_lastname' => $this->input->post('vil_lastname'),
                'vil_telephone' => $this->input->post('vil_telephone'),
                'paytype_id' => $this->input->post('paytype_id')
            );

            $result = $this->Villages->insert($data);

            if($result) {
                $this->transaction_success('Added information village success!');
            }
            
            $this->transaction_fail('Something has wrong :{');
        }

        public function update() {
            $vil_id = $this->input->post('vil_id');

            $data = array(
                'vil_homenumber' => $this->input->post('vil_homenumber'),
                'vil_name' => $this->input->post('vil_name'),
                'vil_lastname' => $this->input->post('vil_lastname'),
                'vil_telephone' => $this->input->post('vil_telephone'),
                'paytype_id' => $this->input->post('paytype_id')
            );

            $result = $this->Villages->update($vil_id, $data);

            if($result) {
                $this->transaction_success('Updated information village success!');
            }
            
            $this->transaction_fail('Something has wrong :{');
        }

        public function delete($vil_id) {
            $result = $this->Villages->delete($vil_id);

            if($result) {
                $this->transaction_success('Deleted information village success!');
            }
            
            $this->transaction_fail('Something has wrong :{');
        }

        public function transaction_success($message) {
            $data = array(
                'message' => $message,
                'title' => 'Success!',
                'class' => 'success'
            );

            $this->session->set_flashdata('data', $data);

            redirect('admin/village');
            return;
        }

        public function transaction_fail($message) {
            $data = array(
                'message' => $message,
                'title' => 'Error!',
                'class' => 'danger'
            );

            $this->session->set_flashdata('data', $data);
            redirect('admin/village');
        }
        
    }
?>