<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

    // initialized and loaded code for this controller
    
    public function __construct() {

        parent::__construct();

    }

    // getting and displaying every suppliers
    
    public function get_all() {

        $query = $this->db->get('supplier');
        return $query->result_array();

    }

    // adding a new supplier
    
    public function insert_supplier($data) {

        $this->db->insert('supplier', $data);
        return $this->db->insert_id(); 

    }

    // getting a single supplier
    
    public function get_supplier($column, $data) {

        $query = $this->db->get_where('supplier', array($column => $data));
        return $query->row_array();

    }

    // updating a supplier 
    
    public function update_supplier($id_supplier, $data) {

        // checking if the supplier doesn't exist
        
        if ($id_supplier == 0) {

            return $this->db->insert('supplier', $data);

        } else {

            $this->db->where('id', $id);
            return $this->db->update('supplier', $data);

        }

        $this->db->where('id_supplier', $id_supplier);
        return $this->db->update('supplier', $data);

    }

    // delete a supplier
    
    public function delete_supplier($id_supplier) {

        return $this->db->delete('supplier', array('id_supplier' => $id_supplier));

    }

}

?>