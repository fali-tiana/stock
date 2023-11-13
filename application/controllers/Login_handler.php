<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_handler extends CI_Controller {


        public function __construct() {
                
                parent::__construct();

                // loading the model 'product model' each time the controller is called

                $this->load->model('Login_model');
                $this->load->helper('cookie');

        }

        public function index() {

                $email = $this->input->post('email');
                $password = $this->input->post('password');

                // checking if the user has been remembered
                if ($this->is_connected()) {
                        
                        return;

                } else {

                        $this->load->library('form_validation');
        
                        // storing the information provided by the user
        
                        $email = $this->input->post('email');
                        $password = $this->input->post('password');
                        $rememberMe = $this->input->post('rememberMe');
        
                        // setting the rules for each input
        
                        $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[6]|max_length[52]|valid_email|callback_matching_email[$email]');
                        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|max_length[52]|callback_matching_password[$password]');

                        
        
                        // Check if the form is running right
        
                        if ($this->form_validation->run() == false)
                        {
        
                                $this->load->view('login_view');
        
                        } else {
        
                                $this->login($rememberMe);
        
                                // storing the data into an array so that we can use it in the view
        
                                $user_data = [
                                        'email' => $email,
                                        'password' => $password,
                                        'is_logged_in' => true,
                                ];

                                $this->session->set_userdata($user_data);

                                redirect('Product/main');
        
                        }

                }
        
        }

        // check if the user match with the responsibles' email inside the database

        public function matching_email($email) {

                $password = $this->input->post('password');

                $matching_email = $this->Login_model->match_responsible(array('email' => $email));
                $matching_responsible = $this->Login_model->match_responsible(array('email' => $email, 'password' => $password));

                if ($matching_responsible == 0 && $matching_email == 0) {

                        $this->form_validation->set_message('matching_email', 'the entered %s did not correspond to any user\'s');

                        return false; 

                } else {

                        return true;

                }

        }

        // check if the user match with the responsibles' password inside the database

        public function matching_password($password) {

                $email = $this->input->post('email');

                $matching_email = $this->Login_model->match_responsible(array('email' => $email));
                $matching_responsible = $this->Login_model->match_responsible(array('email' => $email, 'password' => $password));

                if (($matching_responsible == 0 && $matching_email == 0) || ($matching_responsible == 0 && $matching_email > 0)) {

                        $this->form_validation->set_message('matching_password', 'the password is uncorrect');
                        
                        return false;

                } else {

                        return true;

                }

        }

        // generate unique id for the cookie session

        public function generate_id() {

                return uniqid('', true);

        }

        // checking if the user has already been logged in

        public function login($rememberMe) {

                // Check if "Remember Me" is checked
                if ($rememberMe !== null) {

                        $id = $this->generate_id(); 

                        set_cookie('rememberMe', $id, 86400);

                }

        }

        // checking if the user is currently logged in

        public function is_connected() {

		$rememberMe = $this->input->cookie('rememberMe');

		if ($rememberMe !== null) {

                        $this->load->view('main');

                        return true;

		} else {

                        return false;

                }

	}

        // checking if the user is logging out

        public function logout() {

                // Destroy every information about the cookie and the session
                delete_cookie('rememberMe');
                $this->session->unset_userdata('user_data');

                $this->load->view('login_view');
        
        }

}


?>