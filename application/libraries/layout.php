<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout {

    private $CI;
    private $output = '';

    public function __construct() {

        $this->CI = get_instance();

    }

    // method for changing the view

    public function view($name, $data = array()) {

        $full_name = $this->get_user();

        $this->output .= $this->CI->load->view($name, $data, true);
        $this->CI->load->view('theme/menu', array(

            'output' => $this->output,
            'full_name' => $full_name,

        ));

    }

    public function views($name, $data = array()) {

        $this->output .= $this->CI->load->view($name, $data, true);
        return $this;

    }

    private function get_user() {

        $this->CI->load->library('session');

        // retrieving the user information through the session variables

        $user_email = $this->CI->session->userdata('email');
        $user_password = $this->CI->session->userdata('password');

        $this->CI->db->select('name, last_name');
        $this->CI->db->from('responsible');
        $this->CI->db->where('email', $user_email);
        $this->CI->db->where('password', $user_password);

        $query = $this->CI->db->get();

        // checking the results

        if ($query->num_rows() > 0) {

            $row = $query->row();
            $name = $row->name;
            $last_name = $row->last_name;

            $full_name = $name . ' ' . $last_name;

        } else {

            $username = '';
            $last_name = '';

            $full_name = $name . ' ' . $last_name;

        }
    
        return $full_name;

    }

}

?>
