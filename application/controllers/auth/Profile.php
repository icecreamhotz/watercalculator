<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Profile extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->library('session');

            $this->load->model('Customers');
            $this->load->model('Rates');
        }

        public function index() {
            $cus_id = $this->session->userdata['customers']['cus_id'];
            $data['customers'] = $this->Customers->profile_data($cus_id);
            $data['rates'] = $this->Rates->rate_active();
            
            $this->load->view('customers/auth/index', $data);
        }

    }

?>