<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('CartModel', 'Cart');
        if(empty($this->session->has_userdata('login'))) {
            redirect('user');
        }
    }

    public function index() {
        $user = $this->session->userdata('login');
        $data['cart'] = $this->Cart->get_cart_details($user['user_id']);
        $data['totalPrice'] = $this->Cart->get_total_price($user['user_id']);
        $this->load->view('front/header');
        $this->load->view('front/cart', $data);
        $this->load->view('front/footer');
    }

    public function add_to_cart()
    {
        $post = $this->input->post();
        $user = $this->session->userdata('login');
        $result = $this->Cart->add_to_cart($post, $user['user_id']);
        if($result == "added") {
            $this->session->set_flashdata('successMsg', 'Product added to cart.');
            redirect('cart');
        }elseif($result == "exist") {
            $this->session->set_flashdata('dangerMsg', 'Product allready in cart.');
            redirect('cart');
        } else {
            $this->session->set_flashdata('dangerMsg', 'Something went wrong.');
            redirect('home');
        }
    }

    public function update_cart() {
        $user = $this->session->userdata('login');
        $data = $this->input->post();
        $result = $this->Cart->update_cart($data, $user['user_id']);
        if($result) {
            $this->session->set_flashdata('successMsg', 'Quantity updated successfully.');
            redirect('cart');
        } else {
            $this->session->set_flashdata('dangerMsg', 'Quantity can\'t update.');
            redirect('cart');
        }
    }

    public function delete_cart($productId) {
        if(!empty($productId)) {
            $user = $this->session->userdata('login');
            $data = $this->input->post();
            $result = $this->Cart->delete_cart($productId, $user['user_id']);
            if($result) {
                $this->session->set_flashdata('successMsg', 'Product remove successfully.');
                redirect('cart');
            } else {
                $this->session->set_flashdata('dangerMsg', 'Product can\'t remove.');
                redirect('cart');
            }
        } else {
            $this->session->set_flashdata('dangerMsg', 'Product can\'t remove.');
                redirect('cart');
        }
    }
}