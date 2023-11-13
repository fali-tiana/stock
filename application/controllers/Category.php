<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('Category_model');
        $this->load->library('form_validation');

        // checking if the user is currently logged in

        if(!$this->session->userdata('is_logged_in')) {

            redirect(base_url('Login'));

        }

    }

    public function index() {

        $data['category'] = $this->Category_model->get_all();

        $this->layout->view('category/allCategory', $data);

    }

    public function insert_category() {

        $this->layout->view('category/addCategory');

    }

    public function store_category() {

        $this->form_validation->set_rules('categoryName', 'the category name', 'required');

        if ($this->form_validation->run() == false) {

            $this->layout->view('category/addCategory');

        } else {

            $data = array('category_name' => $this->input->post('categoryName'));

            $category_id = $this->Category_model->insert_category($data);

            redirect(base_url('Category'));

        }

    }

    public function delete($id_category) {

        $category = $this->Category_model->delete_category($id_category);

        redirect(base_url('Category'));

    }

}