
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->helper('form');

            $this->load->library('session');

            $this->load->model('Customers');
        }

        public function login_view() {
            $this->load->view('customers/auth/login');
        }

        public function register_view() {
            $this->load->view('customers/auth/register');
        }

        public function salt_pass($password)
        {
            return md5($password);
        }

        public function register() {
            $data = array(
                'cus_username' => $this->input->post('username'),
                'cus_password' => $this->salt_pass($this->input->post('password')),
                'cus_name' => $this->input->post('firstname'),
                'cus_lastname' => $this->input->post('lastname'),
            );

            $result = $this->Customers->register($data);
            if($result) {
                $data = array(
                    'success' => true,
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password')
                );

                $this->session->set_flashdata('data', $data);

                redirect('login');
                return;
            }

            redirect('register');
        }

        public function login() {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $result = $this->check_login($username, $password);

            if($result) {
                redirect('home');
                return;
            } 

            $this->session->set_flashdata('error', 'Please check username or password!');

            redirect('login');
        }

        public function login_API() {
            header('Content-Type: application/json');
            $data = json_decode(file_get_contents('php://input'), true);
            
            $username = $data['username'];
            $password = $data['password'];

            $result = $this->check_login($username, $password);

            if($result) {
                echo json_encode(['status' => true]);
                return;
            } 
            
            echo json_encode(['status' => false]);
        }

        public function check_login($username, $password) {
            $data = array(
                'username' => $username,
                'password' => $password
            );

            $result = $this->Customers->login($data);
            if ($result) {
                
                $result = $this->Customers->customer_data($username);

                if ($result) {
                    $session_data = array(
                        'cus_id' => $result[0]->cus_id
                    );

                    $this->session->set_userdata('customers', $session_data);
                    return true;
                }
            } 
            return false;
        }

        public function check_username() {
            header('Content-Type: application/json');
            $data = json_decode(file_get_contents('php://input'), true);

            $username = $data['username'];

            $query = $this->Customers->check_username($username);

            if($query->num_rows() == 1) {
                echo json_encode(['status' => false]); 
                return;
            }

            echo json_encode(['status' => true]);
        }

        public function logout() {
            $fake_data = array(
                'cus_id' => ''
            );
            $this->session->unset_userdata('customers', $fake_data);
            $this->session->set_flashdata('logout', 'Successfully Logout');
            redirect('login');
        }
        
    }
?>