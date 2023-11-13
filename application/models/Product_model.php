<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    // initialized and loaded code for this controller
    
    public function __construct() {

        parent::__construct();

    }

    // adding a new product
    
    public function insert_product($data) {

        $this->db->insert('product', $data);
        return $this->db->insert_id(); 

    }

    // adding a new incoming product

    public function insert_incoming_product($id_product, $incoming_quantity) {

        $this->db->insert('incoming_product', array(

            'incoming_quantity' => $incoming_quantity, 
            'id_product' => $id_product

        ));

        return $this->db->insert_id(); 

    }

    // adding a new outcoming product

    public function insert_outcoming_product($id_product, $outcoming_quantity) {

        $this->db->insert('outcoming_product', array(

            'outcoming_quantity' => $outcoming_quantity, 
            'id_product' => $id_product

        ));

        return $this->db->insert_id(); 

    }

    // adding new supplied product (this is the name of the table)

    public function insert_supplied($id_supplier, $id_incoming_product, $entry_date, $incoming_quantity) {

        $this->db->insert('supllied', array(

            'id_supplier' => $id_supplier,
            'id_incoming_product' => $id_incoming_product,
            'incoming_quantity' => $incoming_quantity,
            'entry_date' => $entry_date,

        ));

        return $this->db->insert_id();

    }

    // adding new sent product (this is the name of the table)

    public function insert_send($id_circonscription, $id_outcoming_product, $shipment_date, $status, $outcoming_quantity) {

        $status = '';

        $this->db->insert('send', array(

            'id_circonscription' => $id_circonscription,
            'id_outcoming_product' => $id_outcoming_product,
            'shipment_date' => $shipment_date,
            'status' => $status,
            'outcoming_quantity' => $outcoming_quantity,

        ));

        return $this->db->insert_id();

    }

    // addung a product into the history record

    public function insert_product_history($id_product, $event_type, $event_description, $quantity_change, $date) {

        $this->db->insert('product_history', array(

            'id_product' => $id_product,
            'event_type' => $event_type,
            'event_description' => $event_description,
            'quantity_change' => $quantity_change,
            'date' => $date,

        ));
        
        return $this->db->insert_id();

    }

    // getting and displaying every products
    
    public function get_all() {

        $this->db->select('product.id_product, product.article_code, product.id_category, product.product_name, product.reference, product.bar_code, product.brand, product.stock_quantity, product.technical_properties, product.created_at, category.category_name AS category_name');
        $this->db->from('product');
        $this->db->join('category', 'product.id_category = category.id_category', 'inner');

        $query = $this->db->get();
        return $query->result_array();

    }

    // getting a single product
    
    public function get_product($column, $data) {

        $query = $this->db->get_where('product', array($column => $data));
        return $query->row_array();

    }

    // getting a single product only for the ship method
    
    public function get_product_ship($column, $data) {

        $this->db->select('*');
        $this->db->from('product');
        $this->db->where($column, $data);

        $query = $this->db->get();
        return $query->result_array();

    }

    // getting the first product of the table

    public function get_first_product() {

        $this->db->select( 'product.id_product,  product.article_code,  product.product_name,  product.reference,  product.stock_quantity,  product.technical_properties,  supplier.supplier_name AS supplier_name,  supplier.supplier_contact AS supplier_contact,  category.category_name,  product.brand');
        $this->db->from('product');
        $this->db->join('incoming_product', 'product.id_product = incoming_product.id_product', 'inner');
        $this->db->join('supllied', 'incoming_product.id_incoming_product = supllied.id_incoming_product', 'inner');
        $this->db->join('supplier', 'supllied.id_supplier = supplier.id_supplier', 'inner');
        $this->db->join('category', 'product.id_category = category.id_category', 'inner');
        $this->db->limit(1);
    
        $query = $this->db->get();
        $query_array = $query->result_array();

        // Check if there's any result
        
        if (!empty($query_array)) {

            return $query_array[0]['id_product'];

        } else {
            
            return null;

        }

    }

    // getting the details for a product

    public function get_product_details($id_product) {

        $this->db->select( 'product.id_product,  product.article_code,  product.product_name,  product.reference,  product.stock_quantity,  product.technical_properties,  supplier.supplier_name AS supplier_name,  supplier.supplier_contact AS supplier_contact,  category.category_name,  product.brand');
        $this->db->from('product');
        $this->db->join('incoming_product', 'product.id_product = incoming_product.id_product', 'inner');
        $this->db->join('supllied', 'incoming_product.id_incoming_product = supllied.id_incoming_product', 'inner');
        $this->db->join('supplier', 'supllied.id_supplier = supplier.id_supplier', 'inner');
        $this->db->join('category', 'product.id_category = category.id_category', 'inner');
        $this->db->where('product.id_product', $id_product);
    
        $query = $this->db->get();
        $query_array = $query->row_array();

        if (!empty($query_array)) {

            return $query_array;

        } else {

            return null;

        }

    }

    // getting the smallest and greatest product_id from the product table
    
    public function get_interval_id() {

        // Get the greatest id_product
          
        $this->db->select_max('id_product');
        $query_max = $this->db->get('product');
        $greatest_id_product = $query_max->row()->id_product;

        // Get the smallest id_product
        
        $this->db->select_min('id_product');
        $query_min = $this->db->get('product');
        $smallest_id_product = $query_min->row()->id_product;

        return [

            'greatest_id_product' => $greatest_id_product,
            'smallest_id_product' => $smallest_id_product,

        ];

    }

    //getting the full history record

    public function get_all_history() {

        $this->db->select('product_history.id_history, product_history.id_product, product_history.event_type, product_history.event_description, product_history.quantity_change, product_history.date, product.product_name, product.article_code');
        $this->db->from('product_history');
        $this->db->join('product', 'product_history.id_product = product.id_product', 'inner');

        $query = $this->db->get();
        return $query->result_array();

    }

    // getting a signleproduct details

    public function get_history_detail($id_product) {

        $this->db->select('product.id_product, product.article_code, product.id_category, product.product_name, product.reference, product.bar_code, product.brand, product.stock_quantity, product.technical_properties, product.created_at, category.category_name AS category_name');
        $this->db->from('product');
        $this->db->join('category', 'product.id_category = category.id_category', 'inner');
        $this->db->where('id_product', $id_product);

        $query = $this->db->get();
        return $query->row_array();

    }

    // getting the history of every transactions
    
    public function get_product_history_detail($id_product) {

        $this->db->select('*');
        $this->db->from('product_history');
        $this->db->where('id_product', $id_product);
        $this->db->order_by('date', 'DESC');
        
        $query = $this->db->get();
        return $query->result_array();
        
    }

    // getting the first three history rows

    public function get_history_three_rows() {

        $this->db->select('product_history.id_history, product_history.id_product, product_history.event_type, product_history.event_description, product_history.quantity_change, product_history.date, product.product_name, product.article_code');
        $this->db->from('product_history');
        $this->db->join('product', 'product_history.id_product = product.id_product', 'inner');
        $this->db->order_by('date', 'desc'); 
        $this->db->limit(3);
    
        $query = $this->db->get();
        return $result = $query->result();
    
    }  

    // updating a product 
    
    public function update_product($id_product, $data) {

        // checking if the product doesn't exist
        
        if ($id_product == 0) {

            return $this->db->insert('product', $data);

        } else {

            $this->db->where('id_product', $id_product);

            return $this->db->update('product', $data);

        }

    }

    // delete a product
    
    public function delete_product($id_product) {

        // for the incoming product

        $query_incoming = $this->db->get_where('incoming_product', array('id_product' => $id_product));
        $result_incoming = $query_incoming->result_array();

        // for the outcoming product
        
        $query_outcoming = $this->db->get_where('outcoming_product', array('id_product' => $id_product));
        $result_outcoming = $query_outcoming->result_array();

        // getting the corresponding results

        $id_incoming_products = array_column($result_incoming, 'id_incoming_product');
        $id_outcoming_products = array_column($result_outcoming, 'id_outcoming_product');

        // Using the obtained id_incoming_product value to delete rows from the "supplied" table

        if (!empty($id_incoming_products)) {

            $this->db->where_in('id_incoming_product', $id_incoming_products);
            $this->db->delete('supllied');
            
        }

        // Using the obtained id_outcoming_product value to delete rows from the "send" table

        if (!empty($id_outcoming_products)) {

            $this->db->where_in('id_outcoming_product', $id_outcoming_products);
            $this->db->delete('send');
            
        }


        $this->db->delete('outcoming_product', array('id_product' => $id_product));
        $this->db->delete('incoming_product', array('id_product' => $id_product));
        $this->db->delete('product_history', array('id_product' => $id_product));
        $this->db->delete('product', array('id_product' => $id_product));

    }  

    // getting the total number of products

    public function product_sum() {

        $current_month_stock_quantity = 0;
        $last_month_stock_quantity = 0;
        $stock_quantity_difference_percentage = 0;

        // getting the sum of the stock_quantity column from the product table for the current month
        $this->db->select_sum('stock_quantity');
        $this->db->where('EXTRACT(MONTH FROM created_at) =', date('m'));
        $current_month_stock_quantity = $this->db->get('product')->row()->stock_quantity;

        // getting the sum of the stock_quantity column from the product table for the last month
        $this->db->select_sum('stock_quantity');
        $this->db->where('EXTRACT(MONTH FROM created_at) =', date('m') - 1);
        $last_month_stock_quantity = $this->db->get('product')->row()->stock_quantity;
        
        // getting the rate of the product sum
        $stock_quantity_difference_percentage = ($last_month_stock_quantity == 0) ? 100 : (($current_month_stock_quantity - $last_month_stock_quantity) / $last_month_stock_quantity * 100);

        return array(

            'current_month_stock_quantity' => $current_month_stock_quantity,
            'stock_quantity_difference_percentage' => $stock_quantity_difference_percentage,

        );

    }

    // getting the total number of incoming products

    public function incoming_product_sum() {

        
        $current_month_incoming_quantity = 0;
        $last_month_incoming_quantity = 0;
        $incoming_product_difference_percentage = 0;

        // Get the sum of the incoming product from the supplied table for the current month
        $this->db->select_sum('incoming_quantity');
        $this->db->where('EXTRACT(MONTH FROM entry_date) =', date('m'));
        $current_month_incoming_quantity = $this->db->get('supllied')->row()->incoming_quantity;

        // Get the sum of the incoming product from the supplied table for the previous month
        $this->db->select_sum('incoming_quantity');
        $this->db->where('EXTRACT(MONTH FROM entry_date) =', date('m') - 1);
        $last_month_incoming_quantity = $this->db->get('supllied')->row()->incoming_quantity;
        
        // getting the rate of the incoming product sum
        $incoming_product_difference_percentage = ($last_month_incoming_quantity == 0) ? 100 : (($current_month_incoming_quantity - $last_month_incoming_quantity) / $last_month_incoming_quantity * 100);

        return array(

            'current_month_incoming_quantity' => $current_month_incoming_quantity,
            'incoming_product_difference_percentage' => $incoming_product_difference_percentage,

        );


    }

    // getting the total number of outcoming product

    public function outcoming_product_sum() {

        $current_month_outcoming_quantity = 0;
        $last_month_outcoming_quantity = 0;
        $outcoming_product_difference_percentage = 0;

        // Get the sum of the outcoming quantity from the send table for the current month
        $this->db->select_sum('outcoming_quantity');
        $this->db->where('EXTRACT(MONTH FROM shipment_date) =', date('m'));
        $current_month_outcoming_quantity = $this->db->get('send')->row()->outcoming_quantity;

        // Get the sum of the outcoming quantity from the send table for the previous month
        $this->db->select_sum('outcoming_quantity');
        $this->db->where('EXTRACT(MONTH FROM shipment_date) =', date('m') - 1);
        $last_month_outcoming_quantity = $this->db->get('send')->row()->outcoming_quantity;
        
        // Calculate the rate of evolution of the total outcoming product
        $outcoming_product_difference_percentage = ($last_month_outcoming_quantity == 0) ? 100 : (($current_month_outcoming_quantity - $last_month_outcoming_quantity) / $last_month_outcoming_quantity * 100);

        return array(

            'current_month_outcoming_quantity' => $current_month_outcoming_quantity,
            'outcoming_product_difference_percentage' => $outcoming_product_difference_percentage,

        );

    }
    

}

?>