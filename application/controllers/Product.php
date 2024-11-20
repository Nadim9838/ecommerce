<?php defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('categoryModel');
        $this->load->model('productModel');
    }

    // Index  
    public function index() {
        $this->form_validation->set_rules('product_id', 'Product Id', 'required|trim');
        $this->form_validation->set_rules('cat', 'Category', 'required|trim');
        $this->form_validation->set_rules('product_name', 'Product Name', 'required|trim');
        $this->form_validation->set_rules('brand', 'Brand', 'required|trim');
        $this->form_validation->set_rules('featured', 'Featured', 'required|trim');
        $this->form_validation->set_rules('highlights', 'Highlights', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('mrp', 'Product MRP', 'required|trim');
        $this->form_validation->set_rules('selling_price', 'Product Selling Price', 'required|trim');
        $this->form_validation->set_rules('stock', 'Product Stock', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        if(empty($_FILES['pro_main_image']['name'])) {
            $this->form_validation->set_rules('pro_main_image', 'Product Image', 'required|trim');
        }
        if($this->form_validation->run()) {
            $post = $this->input->post();
            $config['upload_path'] = './images/product_img';
            $config['allowed_types'] = '*';

            $this->load->library('upload', $config);
            $this->upload->do_upload('pro_main_image');
            $imgData = $this->upload->data();
            $post['pro_main_image'] = $imgData['raw_name'].$imgData['file_ext'];
            
            if(!empty($_FILES['gallery_image']['name'])) {
                $config['upload_path'] = './images/product_img';
                $config['allowed_types'] = '*';

                $this->load->library('upload', $config);
                $this->upload->do_upload('gallery_image');
                $imgData = $this->upload->data();
                $post['gallery_image'] = $imgData['raw_name'].$imgData['file_ext'];
            }
            $result = $this->productModel->add_product($post);
            if($result) {
                $this->session->set_flashdata('successMsg', 'New Product Added Successfully!!');
                redirect('product/');
            } else {
                $this->session->set_flashdata('dangerMsg', 'New Product Insertion Failed!!');
                redirect('product/');
            }
        } else {
            $data['categories'] = $this->categoryModel->get_all_category();
            if($this->session->userdata('product_id') != '') {
                $productId = $this->session->userdata('product_id');
            } else {
                $this->session->set_userdata('product_id', mt_rand(11111,99999));
            }
            $data['productId'] = $productId;
            $this->load->view('header');
            $this->load->view('product', $data);
            $this->load->view('footer'); 
        }
    }
} 