<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Circonscription_model extends CI_Model {

    // initialized and loaded code for this controller
    
    public function __construct() {

        parent::__construct();

    }

    // getting and displaying every circonscriptions
    
    public function get_all() {

        $query = $this->db->get('circonscription_domaniale');
        return $query->result_array();

    }

    // adding a new circonscription
    
    public function insert_circonscription($data) {

        $this->db->insert('circonscription_domaniale', $data);
        return $this->db->insert_id(); 

    }

    // getting a single circonscription
    
    public function get_circonscription($column, $data) {

        $query = $this->db->get_where('circonscription_domaniale', array($column => $data));
        return $query->row_array();

    }

    // updating a circonscription 
    
    public function update_circonscription($id_circonscription, $data) {

        // checking if the circonscription doesn't exist
        
        if ($id_circonscription == 0) {

            return $this->db->insert('circonscription_domaniale', $data);

        } else {

            $this->db->where('id', $id);
            return $this->db->update('circonscription_domaniale', $data);

        }

        $this->db->where('id_circonscription', $id_circonscription);
        return $this->db->update('circonscription_domaniale', $data);

    }

    // delete a circonscription
    
    public function delete_circonscription($id_circonscription) {

        return $this->db->delete('circonscription_domaniale', array('id_circonscription' => $id_circonscription));

    }

}

?>