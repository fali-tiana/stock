<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    // initialized and loaded code for this controller
    
    public function __construct() {

        parent::__construct();

        $this->load->model('Product_model');
        $this->load->model('Supplier_model');
        $this->load->model('Category_model');
        $this->load->model('Circonscription_model');

        $this->load->library('form_validation');

        // checking if the user is currently logged in

        $this->is_logged_in();

    }

    public function index() {

        $data['product'] = $this->Product_model->get_all();

        $this->layout->view('products/allProduct', $data);

    }

    public function main() {

        // product sum for the FIRST card
        $product_sum = $this->Product_model->product_sum();
        $data['total_product'] = $product_sum['current_month_stock_quantity'];
        $data['total_product_rate'] = $product_sum['stock_quantity_difference_percentage'];

        // incoming product sum for the SECOND card
        $incoming_product_sum = $this->Product_model->incoming_product_sum();
        $data['total_incoming_product'] = $incoming_product_sum['current_month_incoming_quantity'];
        $data['total_incoming_product_rate'] = $incoming_product_sum['incoming_product_difference_percentage'];
        
        // outcoming product sum for the THIRD card
        $outcoming_product_sum = $this->Product_model->outcoming_product_sum();
        $data['total_outcoming_product'] = $outcoming_product_sum['current_month_outcoming_quantity'];
        $data['total_outcoming_product_rate'] = $outcoming_product_sum['outcoming_product_difference_percentage'];

        // getting the first three rows of the history product table
        $data['recent_history'] = $this->Product_model->get_history_three_rows();

        $this->layout->view('products/dashboard', $data);

    }

    // displaying a list of all products
    
    public function list() {

        $this->index();

    }

    // adding a new product

    public function create() {

        $data['category'] = $this->Category_model->get_all();

        $this->layout->view('products/addProduct', $data);

    }

    // storing a new product

    public function store() {

        // rules for the product information
        $this->form_validation->set_rules('productName', 'the product name', 'required');
        $this->form_validation->set_rules('articleCode', 'the product article code', 'required');
        $this->form_validation->set_rules('reference', 'the product reference', 'required');
        $this->form_validation->set_rules('quantity', 'the product inserted quantity', 'required');
        $this->form_validation->set_rules('description', 'the product description', 'required');

        // rules for the supplier information
        $this->form_validation->set_rules('supplierName', 'the supplier name', 'required');
        $this->form_validation->set_rules('supplierContact', 'the supplier contact');
        $this->form_validation->set_rules('category', 'the product category', 'required');
        $this->form_validation->set_rules('brand', 'the product brand', 'required');

        if ($this->form_validation->run() == FALSE) {
            
            $this->session->set_flashdata('errors', validation_errors());

            redirect(base_url('Product/create'));

        } else {

            $data = array(

                'product_name' => $this->input->post('productName'),
                'article_code' => $this->input->post('articleCode'),
                'reference' => $this->input->post('reference'),
                'stock_quantity' => intval($this->input->post('quantity')),
                'technical_properties' => $this->input->post('description'),
                'brand' => $this->input->post('brand'),
                'supplier_name' => $this->input->post('supplierName'),
                'supplier_contact' => $this->input->post('supplierContact'),
                'category_name' => $this->input->post('category'),

                // current date and time of the inserting
                'current_datetime' => date('Y-m-d'),

            );

            // Check if the product already exists

            $matching_product = $this->Product_model->get_product('product_name', $data['product_name']);

            if ($matching_product) {

                $this->update_stock_quantity($matching_product['stock_quantity'], $data['stock_quantity'], $matching_product);

                // displaying a json response message

                $response = array(

                    'success' => true,
                    'message' => 'Product updated successfully',

                );

                echo json_encode($response);
                return;
                
            } else {

                // checking the category and the supplier

                $category_and_supplier = $this->check_category_and_supplier($data);

                // the product datas

                $product = array(

                    'product_name' => $data['product_name'],
                    'article_code' => $data['article_code'],
                    'reference' => $data['reference'],
                    'stock_quantity' => intval($data['stock_quantity']),
                    'technical_properties' => $data['technical_properties'],
                    'brand' => $data['brand'],
                    'id_category' => intval($id_category),
                    'created_at' => $data['current_datetime'],

                );
                
                // Inserting new product

                $id_product = $this->Product_model->insert_product($product);
                $id_incoming_product = $this->Product_model->insert_incoming_product($id_product, $data['stock_quantity']);

                
                /* ========================= handling the insertion in the history record ========================= */ 


                // inserting into the history

                $this->history_insert($data, $id_product, $category_and_supplier['id_supplier'], $id_incoming_product);

                // displaying a json response message

                $response = array(

                    'success' => true,
                    'message' => 'Product inserted successfully',

                );

                echo json_encode($response);
                return;

            }


            
        }

    }

    // editing a new product

    public function edit($id_product) {

        $data['product'] = $this->Product_model->get_product_details($id_product);

        if (!$data['product']) {

            $this->layout->view('nothing');

        } else {

            $interval = $this->Product_model->get_interval_id();
         
            $data['greatest_id'] = $interval['greatest_id_product'];
            $data['smallest_id'] = $interval['smallest_id_product'];

            $this->layout->view('products/details', $data);

        }

    }

    // editing the first returned product

    public function edit_first() {

        $id_product = $this->Product_model->get_first_product();

        if (!$id_product) {

            $this->layout->view('nothing');

        } else {

            $interval = $this->Product_model->get_interval_id(); 

            $data['greatest_id'] = $interval['greatest_id_product'];
            $data['smallest_id'] = $interval['smallest_id_product'];
            $data['product'] = $this->Product_model->get_product_details($id_product);

            $this->layout->view('products/details', $data);

        }

    }

    // updating a product

    public function update($id_product) {

        // rules for the product information
        $this->form_validation->set_rules('productName', 'the product name', 'required');
        $this->form_validation->set_rules('articleCode', 'the product article code', 'required');
        $this->form_validation->set_rules('reference', 'the product reference', 'required');
        $this->form_validation->set_rules('quantity', 'the product updated quantity', 'required');
        $this->form_validation->set_rules('description', 'the product description', 'required');

        // rules for the supplier information
        $this->form_validation->set_rules('supplierName', 'the supplier name', 'required');
        $this->form_validation->set_rules('supplierContact', 'the supplier contact');
        $this->form_validation->set_rules('category', 'the product category', 'required');
        $this->form_validation->set_rules('brand', 'the product brand', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_error());
            redirect(base_url('Product/edit/' . $id_product));

        } else {

            $data = array(

                'product_name' => $this->input->post('productName'),
                'article_code' => $this->input->post('articleCode'),
                'reference' => $this->input->post('reference'),
                'stock_quantity' => intval($this->input->post('quantity')),
                'technical_properties' => $this->input->post('description'),
                'brand' => $this->input->post('brand'),
                'supplier_name' => $this->input->post('supplierName'),
                'supplier_contact' => $this->input->post('supplierContact'),
                'category_name' => $this->input->post('category'),

                // current date and time of the inserting
                'current_datetime' => date('Y-m-d'),

            );

            // checking the category and the supplier

            $category_and_supplier = $this->check_category_and_supplier($data);

            // Checking if the category already exists

            $id_category = $category_and_supplier['id_category'];

            if (!$id_category) {

                // Inserting new category
                
                $id_category = $this->Category_model->insert_category( array(

                    'category_name' => $data['category_name'],

                ));

            }

            // updating the product

            $product = array(

                'product_name' => $data['product_name'],
                'article_code' => $data['article_code'],
                'reference' => $data['reference'],
                'stock_quantity' => intval($data['stock_quantity']),
                'technical_properties' => $data['technical_properties'],
                'brand' => $data['brand'],
                'id_category' => intval($id_category),
                'created_at' => $data['current_datetime'],

            );

            $this->Product_model->update_product($id_product, $product);


            /* ========================= handling the update in the history record ========================= */ 
            

            // inserting into the history

            $this->history_update($data, $id_product);

            // the response object for the toastr notification

            $response = array(

                'success' => true,
                'message' => 'Product updated successfully',

            );

            echo json_encode($response);
            return;

        }

    }

    // shipping a product 

    public function ship($id_product) {

        /*
            okay so basically what i want to do is to open a modal 
            when the ship button is being pressed
            the modal will contain an input to designate the domanial circonscription
            where to send the product (effectively, all the information about the product
            will be conserved when the button to the corresponding product is pressed)
            then a slider to indicate the quantity shipped
        */

        $this->form_validation->set_rules('circonscription', 'the domanial circonscription name', 'required');
        $this->form_validation->set_rules('quantityShipped', 'the shipped quantity', 'required');

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('errors', validation_errors());
            
            $response = array(
                'success' => false,
                'message' => validation_errors(),
            );

            echo json_encode($response);
            return;

        } else {

            if(!$this->ship_rules($id_product)) {

                $response = array(
                    'success' => false,
                    'message' => 'the shipped quantity exceed the normal stock quantity',
                );

                echo json_encode($response);
                return;

            } else {

                $matching_product = $this->Product_model->get_product('id_product', $id_product);

                $circonscription = $this->input->post('circonscription');
                $quantity_change = $this->input->post('quantityShipped');
                $description = $this->input->post('description');

                // Determining the event type and description for history

                $event_type = 'shipment';
                $event_description = 'Product shipped';
                $event_date = date('Y-m-d');

                
                // handling the update in the history record

                $this->history_ship($id_product);

                // updating the product quantity 

                $id_outcoming_product = $this->update_stock_ship($id_product, $quantity_change, $matching_product);

                // handling the circonscription insertion 

                $this->insert_send_product($circonscription, $id_outcoming_product, $event_date, $event_description, $quantity_change);

                // the response object for the toastr notification

                $response = array(

                    'success' => true,
                    'message' => 'Product shipped successfully',

                );

                echo json_encode($response);
                return;


            }

            
        }
        
    }

    // ship rules

    public function ship_rules($id_product) {

        $quantity_change = $this->input->post('quantityShipped');

        $the_product = $this->Product_model-> get_product_ship('id_product', $id_product);
        $the_product_first = reset($the_product);

        if ($quantity_change > $the_product_first['stock_quantity']) {

            $this->form_validation->set_message('ship_rules', 'the quantity exceed the original quantity');
            return false;

        }

        return true;

    }

    // deleting a product

    public function delete($id_product) {

        $product = $this->Product_model->delete_product($id_product);

        redirect(base_url('Product/list'));

    }

    // viewing history

    public function history() {

        $data['product'] = $this->Product_model->get_all_history();
        $this->layout->view('products/history', $data);
    
    }

    // handling the history logic
    
    public function history_detail($id_product) {

        $data['history'] = $this->Product_model->get_product_history_detail($id_product);
        $data['product'] = $this->Product_model->get_history_detail($id_product);

        $this->layout->view('products/history_detail_view', $data);
        
    }

    // generating the pdf for all the product

    public function generate_pdf() {

        $this->load->library('pdf');

        $data['product'] = $this->Product_model->get_all();
        $html = $this->load->view('products/productTable', $data, true);

        $dompdf = new PDF();

        // setting the paper size and orientation.
        $dompdf->set_paper('A4', 'landscape');

        // loading the HTML content into DomPDF.
        $dompdf->load_html($html);

        // rendering the HTML content into a PDF file.
        $dompdf->render();

        // generating the PDF output.
        $output = $dompdf->output();

        // prompting the user to download the PDF file.
        $this->output->set_content_type('application/pdf');
        $this->output->set_header('Content-Disposition: attachment; filename="Liste des produits.pdf"');
        $this->output->set_output($output);

        // generating a json response back to the browser
        header('Content-Type: application/json');
        echo json_encode(['pdf' => $response]);

    }

    // generating the pdf for all product with descriptions

    public function generate_pdf_details() {

        $this->load->library('pdf');

        $data['product'] = $this->Product_model->get_all();
        $html = $this->load->view('products/productDetails', $data, true);

        $dompdf = new PDF();

        // setting the paper size and orientation.
        $dompdf->set_paper('A4', 'landscape');

        // loading the HTML content into DomPDF.
        $dompdf->load_html($html);

        // rendering the HTML content into a PDF file.
        $dompdf->render();

        // generating the PDF output.
        $output = $dompdf->output();

        // prompting the user to download the PDF file.
        $this->output->set_content_type('application/pdf');
        $this->output->set_header('Content-Disposition: attachment; filename="Liste des produits avec détails.pdf"');
        $this->output->set_output($output);

        // generating a json response back to the browser
        header('Content-Type: application/json');
        echo json_encode(['pdf' => $response]);

    }
    
    // checking if the user is logged in

    private function is_logged_in() {

        if(!$this->session->userdata('is_logged_in')) {

            redirect(base_url('Login'));

        }

    }

    // updating the stock quantity on the store method

    private function update_stock_quantity($current_stock_quantity, $new_stored_quantity, $matching_product) {

        $current_quantity = $current_stock_quantity;
        $new_quantity = $new_stored_quantity;
        $new_stock_quantity = $current_quantity + $new_quantity;

        // updating the product quantity

        $this->Product_model->update_product($matching_product['id_product'], array(

            'stock_quantity' => $new_stock_quantity,

        ));

    }

    // updating stock quantity after a ship

    private function update_stock_ship($id_product, $quantity_change, $matching_product) {

        $current_quantity = $matching_product['stock_quantity'];
        $new_stock_quantity = $current_quantity - $quantity_change;

        // preparing the data for the update

        $data = array('stock_quantity' => $new_stock_quantity);

        // updating the value of the product quantity and inserting the outcoming product

        $this->Product_model->update_product($id_product, $data);
        $id_outcoming_product = $this->Product_model->insert_outcoming_product($id_product, $quantity_change);

        return $id_outcoming_product;

    }

    // checking the supplier (just in case)

    private function checking_supplier($matching_supplier, $data) {

        if ($matching_supplier) {
                    
            $id_supplier = $matching_supplier['id_supplier'];
            
        } else {

            // Inserting new supplier
            
            $id_supplier = $this->Supplier_model->insert_supplier( array(
                
                'supplier_name' => $data['supplier_name'],
                'supplier_contact' => $data['supplier_contact'],
                
            ));

        }

    }

    // checking the category and the supplier

    private function check_category_and_supplier($data) {

        // checking the category

        $matching_category = $this->Category_model->get_category('category_name', $data['category_name']);

        $id_category = $matching_category['id_category'];
        
        // checking the supplier

        $matching_supplier = $this->Supplier_model->get_supplier('supplier_name', $data['supplier_name']);

        $id_supplier = $matching_supplier ? $matching_supplier['id_supplier'] : $this->Supplier_model->insert_supplier( array(
                
            'supplier_name' => $data['supplier_name'],
            'supplier_contact' => $data['supplier_contact'],
            
        ));

        return [

            'id_category' => $id_category,
            'id_supplier' => $id_supplier,

        ];

    }

    // inserting into the history for INSERTION

    private function history_insert($data, $id_product, $id_supplier, $id_incoming_product) {

        // Determining the event type and description for history

        $event_type = 'insert';
        $event_description = 'Product inserted';
        $event_date = $data['current_datetime'];

        // Determining the quantity change for history

        $quantity_change = $data['stock_quantity'];

        // inserting into the product history
        
        $id_history_product = $this->Product_model->insert_product_history($id_product, $event_type, $event_description, $quantity_change, $event_date);

        /*
            this is where i will also insert the 
            supplier id and the incoming product id
            in the "supplied" table 
        */

        $id_supplied_product = $this->Product_model->insert_supplied($id_supplier, $id_incoming_product, $data['current_datetime'], $quantity_change);

    }

    // inserting into the history for UPDATE

    private function history_update($data, $id_product) {

        // Determining the event type and description for history

        $event_type = 'update';
        $event_description = 'Product updated';
        $event_date = $data['current_datetime'];

        // Determining the quantity change for history

        $updated_product = $this->Product_model->get_product('id_product', $id_product); 

        $quantity_change = $updated_product['stock_quantity'];

        // inserting into the product history

        $id_history_product = $this->Product_model->insert_product_history($id_product, $event_type, $event_description, $quantity_change, $event_date);

    }

    // inserting into the history for SHIP
    
    private function history_ship($id_product) {

        // Determining the event type and description for history

        $event_type = 'shipment';
        $event_description = 'Product shipped';
        $event_date = date('Y-m-d');

        // inserting into product history

        $id_history = $this->Product_model->insert_product_history($id_product, $event_type, $event_description, $quantity_change, $event_date);

    }

    // inserting new circonscription and new send product (into the "send" table)
    
    private function insert_send_product($circonscription, $id_outcoming_product, $event_date, $event_description, $quantity_change) {  

        $matching_circonscription = $this->Circonscription_model->get_circonscription('circonscription_name', $circonscription);
        $inserted_circonscription = array('circonscription_name' => $circonscription);

        if (!$matching_circonscription) {

            $id_circonscription = $this->Circonscription_model->insert_circonscription($inserted_circonscription);

            $id_send_product = $this->Product_model->insert_send($id_circonscription, $id_outcoming_product, $event_date, $event_description, $quantity_change);

        } 

        $id_circonscription = $matching_circonscription['id_circonscription'];
        $id_send_product = $this->Product_model->insert_send($id_circonscription, $id_outcoming_product, $event_date, $event_description, $quantity_change);

    }

}


?>