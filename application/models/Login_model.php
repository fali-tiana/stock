<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    protected $table = 'responsible';

    //inserting data to the database
    
    public function add_responsible($data) {

        return $this->db->insert($table, $data);
        
    }

    // checking if the entered credentials match any user in the database
    
    public function match_responsible($condition = array()) {
        return (int) $this->db->where($condition)
                              ->count_all_results($this->table);  
    }

}

?>