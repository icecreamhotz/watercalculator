
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Bill extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->helper('form');

            $this->load->library('session');

            $this->load->model('Villages');
            $this->load->model('Employees');
            $this->load->model('Bills');
        }

        public function bill_admin_view() {
            $data['villages'] = $this->Villages->villages_data_bill();
            $data['content'] = $this->load->view('admin/backend/bill', $data, true);
            $data['title'] = 'Bill';
            $data['employee'] = $this->Employees->employee_data('emp_id', $this->session->userdata['employees']['emp_id']);
            $this->load->view('admin/auth/layout', $data);
        }

        public function insert() {
            $meter = ($this->input->post('bill_metertotal') == "" ? 0 : $this->input->post('bill_metertotal'));
            $data = array(
                'bill_metertotal' => $meter,
                'rate_id' => $this->input->post('rate_id'),
                'vil_id' => $this->input->post('vil_id'),
                'emp_id' => $this->session->userdata['employees']['emp_id']
            );

            $result = $this->Bills->insert($data);

            if($result) {
                $this->transaction_success('Added information village success!');
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

            redirect('admin/bill');
            return;
        }

        public function transaction_fail($message) {
            $data = array(
                'message' => $message,
                'title' => 'Error!',
                'class' => 'danger'
            );

            $this->session->set_flashdata('data', $data);
            redirect('admin/bill');
        }
        
    }
?>