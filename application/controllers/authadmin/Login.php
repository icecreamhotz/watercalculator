
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->helper('form');

            $this->load->library('session');

            $this->load->model('Employees');
        }

        public function login_admin_view() {
            $this->load->view('admin/auth/login');
        }

        public function dashboard_admin_view() {
            $data['employee'] = $this->Employees->employee_data('emp_id', $this->session->userdata['employees']['emp_id']);
            $data['content'] = $this->load->view('admin/auth/index', '', true);
            $data['title'] = 'Dashboard';
            $this->load->view('admin/auth/layout', $data);
        }

        public function login() {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );

            $result = $this->Employees->login($data);

            if($result) {
                $result = $this->Employees->employee_data('emp_username', $data['username']);

                if($result) {
                    $session_data = array(
                        'emp_id' => $result[0]->emp_id
                    );

                    $this->session->set_userdata('employees', $session_data);
                    redirect('admin/dashboard');
                    return;
                }
            }

            redirect('admin/login');
        }

        public function logout() {
            $fake_data = array(
                'emp_id' => ''
            );
            $this->session->unset_userdata('employees', $fake_data);
            $this->session->set_flashdata('logout', 'Successfully Logout');
            redirect('admin/login');
        }

    }
?>