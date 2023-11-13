<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfController extends CI_Controller {

    public function index() {

        redirect('PdfController/testPdf');

    }

    public function testPdf() {

        $this->load->library('pdf');
        $html = "we are testing so ignore this.";
        
        $dompdf = new PDF();
        $dompdf->load_html($html);
        $dompdf->render();
        $output = $dompdf->output();
        $this->output->set_content_type('application/pdf');
        $this->output->set_header('Content-Disposition: attachment; filename="products.pdf"');
        $this->output->set_output($output);

    }

}
?>