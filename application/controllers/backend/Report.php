
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Report extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->helper('form');

            $this->load->library('session');

            $this->load->model('Bills');
            $this->load->model('Employees');
        }

        public function report_admin_view() {
            $data['bills'] = $this->Bills->bill_data();
            $data['content'] = $this->load->view('admin/backend/report', $data, true);
            $data['title'] = 'Report';
            $data['employee'] = $this->Employees->employee_data('emp_id', $this->session->userdata['employees']['emp_id']);
            $this->load->view('admin/auth/layout', $data);
        }
        
    }
?>