<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->model('Login_model');
        $this->load->helper('cookie');

	}

	// load the login view
	public function index()	{

		$this->is_connected();

	}

	// check if the user is connnected
	public function is_connected() {

		$rememberMe = $this->input->cookie('rememberMe');

		if ($rememberMe !== null) {

			$this->layout->view('products/dashboard');

		} else {

			$this->load->view('login_view');

		}

	}
}
