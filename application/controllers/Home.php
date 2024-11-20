<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('homeModel', 'Home');
    }

    public function index() {
        $data['banner'] = $this->Home->get_banner();
        $data['category'] = $this->Home->get_category();
        $data['product'] = $this->Home->get_products();
        $this->load->view('front/header');
        $this->load->view('front/index', $data);
        $this->load->view('front/footer');
    }

    public function product_url($slug)
    {
        $data['r'] = $this->Home->product_url($slug);
        $this->load->view('front/header');
        $this->load->view('front/product_details', $data);
        $this->load->view('front/footer');
    }

    public function category_product($slug, $slug2="") {
        if(!empty($slug) && !empty($slug2)) {
            $catId = $this->Home->get_category_product($slug2);
        } else {
            $catId = $this->Home->get_category_product($slug);
        }

        $data['product'] = $this->Home->fetch_product($catId);
        $this->load->view('front/header');
        $this->load->view('front/category_products', $data);
        $this->load->view('front/footer');

    }

    public function contact() {
        $this->load->view('front/header');
        $this->load->view('front/contact');
        $this->load->view('front/footer');
    }

    public function about() {
        $this->load->view('front/header');
        $this->load->view('front/about');
        $this->load->view('front/footer');
    }

    public function terms() {
        $this->load->view('front/header');
        $this->load->view('front/terms');
        $this->load->view('front/footer');
    }

    public function letest_news() {
        $this->load->view('front/header');
        $this->load->view('front/letest_news');
        $this->load->view('front/footer');
    }

    public function policy_privacy() {
        $this->load->view('front/header');
        $this->load->view('front/privacy_policy');
        $this->load->view('front/footer');
    }
}