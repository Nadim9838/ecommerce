<?php defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('categoryModel');
    }
    public function index() {
        $this->form_validation->set_rules('cat_name', 'Category Name', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        if($this->form_validation->run()) {
            $post = $this->input->post();
            if(!empty($_FILES['cat_image']['name'])) {
                $config['upload_path'] = './images/category_img';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->do_upload('cat_image');
                $imgData = $this->upload->data();
                $post['cat_image'] = $imgData['file_name'];
            }
            $result = $this->categoryModel->add_category($post);
            if($result) {
                $this->session->set_flashdata('successMsg', 'New Category Added Successfully!!');
                redirect('category/index');
            } else {
                $this->session->set_flashdata('dangerMsg', 'New Category Insertion Failed!!');
                redirect('category/index');

            }
        } else {
            $data['categories'] = $this->categoryModel->get_all_category();
            $this->load->view('header');
            $this->load->view('category', $data);
            $this->load->view('footer'); 
        }
    }

    public function get_sub_category() {
        $catId = $this->input->post('cat_id');
        $result = $this->categoryModel->get_sub_category($catId);
            if(isset($result)) {
                return $result;
            } else {
               return 0;
            }
    }
} 