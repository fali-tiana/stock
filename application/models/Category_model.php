<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    // initialized and loaded code for this controller
    
    public function __construct() {

        parent::__construct();

    }

    // getting and displaying every categorys
    
    public function get_all() {

        $query = $this->db->get('category');
        return $query->result_array();

    }

    // getting a single category
    
    public function get_category($column, $data) {

        $query = $this->db->get_where('category', array($column => $data));
        return $query->row_array();

    }

    // adding a new category
    
    public function insert_category($data) {

        $this->db->insert('category', $data);
        return $this->db->insert_id(); 

    }

    // delete a category
    
    public function delete_category($id_category) {

        return $this->db->delete('category', array('id_category' => $id_category));

    }

}

?>