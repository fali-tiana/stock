<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    // initialized and loaded code for this controller
    
    public function __construct() {

        parent::__construct();

        $this->load->model('Settings_model');

        $this->load->library('form_validation');

        // checking if the user is currently logged in

        if(!$this->session->userdata('is_logged_in')) {

            redirect(base_url('Login'));

        }
        
    }

    public function index() {

        $this->settings_view();

    }

    // the setting view

    public function settings_view() {

        $settings_data['user_information'] = $this->Settings_model->get_settings();
        $data['user'] = $settings_data['user_information'];

        if (!$data['user']) {

            $this->layout->view('nothing');
            return;

        }

        $this->layout->view('theme/settings', $data);
        return;

    }

    // setting the user's information

    public function set_settings($id_responsible) {

        $this->form_validation->set_rules('email', 'the email', 'trim|required|min_length[6]|max_length[52]|valid_email');

        $data = array(

            'name' => $this->input->post('firstName'),
            'last_name' => $this->input->post('lastName'),
            'department' => $this->input->post('department'),
            'function' => $this->input->post('position'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),

        );

        if ($this->form_validation->run() == false) {

            $this->layout->view('theme/settings');

        } else {

            $this->Settings_model->update_settings($id_responsible, $data); 
            redirect(base_url('Settings'));

        }

    }

    // setting the password

    public function set_passwords($id_responsable) {
        
        $this->form_validation->set_rules('password', 'the password', 'trim|required|min_length[6]|max_length[52]|');
        $this->form_validation->set_rules('passwordConfirm', 'confirm password', 'trim|required|min_length[6]|max_length[52]|matches[password]');

        if ($this->form_validation->run() == false) {

            $this->layout->view('theme/settings');

        } else {

            $data = array( 'password' => $this->input->post('password') );

            $this->Settings_model->update_settings($id_responsible, $data); 
            redirect(base_url('Settings'));

        }

    }

}

?>