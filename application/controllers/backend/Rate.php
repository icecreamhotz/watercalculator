
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Rate extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->helper('form');

            $this->load->library('session');

            $this->load->model('Rates');
            $this->load->model('Employees');
        }

        public function rate_admin_view() {
            $data['rates'] = $this->Rates->rate_active();
            $data['content'] = $this->load->view('admin/backend/rate', $data, true);
            $data['title'] = 'Rate';
            $data['employee'] = $this->Employees->employee_data('emp_id', $this->session->userdata['employees']['emp_id']);
            $this->load->view('admin/auth/layout', $data);
        }

        public function edit() {
            $rate_id = array(
                $this->input->post('rate_idone'),
                $this->input->post('rate_idtwo')
            );

            $data = array(
                array(
                    'rate_price' => $this->input->post('rate_one'),
                    'paytype_id' => $this->input->post('paytype_idone')
                ),
                array(
                    'rate_price' => $this->input->post('rate_two'),
                    'paytype_id' => $this->input->post('paytype_idtwo')
                ),
            );

            $edit = false;

            foreach($data as $key => $value) {
                $result = $this->Rates->edit($rate_id[$key], $value);
                if($result) {
                    $edit = true;
                } else {
                    $edit = false;
                }
            }

            if($edit) {
                $this->transaction_success('Updated rates success!');
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

            redirect('admin/rate');
            return;
        }

        public function transaction_fail($message) {
            $data = array(
                'message' => $message,
                'title' => 'Error!',
                'class' => 'danger'
            );

            $this->session->set_flashdata('data', $data);
            redirect('admin/rate');
        }
        
    }
?>