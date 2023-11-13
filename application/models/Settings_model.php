<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

    // initialized and loaded code for this controller

    public function __construct() {

        parent::__construct();

    }

    public function get_settings() {

        $user_email = $this->session->userdata('email');
        $user_password = $this->session->userdata('password');

        return $this->db->get_where('responsible', array('email' => $user_email, 'password' => $user_password))->row();

    }

    public function update_settings($id_responsable, $data) {

        $this->db->where('id_responsable', $id_responsable);
        return $this->db->update('responsible', $data);

    }

}

?>