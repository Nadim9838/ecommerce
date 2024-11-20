<?php defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('userModel', 'User');
    }
    public function index() {
        $this->load->view('front/header');
        $this->load->view('front/login');
        $this->load->view('front/footer');
    }

    public function login() {
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]');
        if($this->form_validation->run()) {
            $post = $this->input->post();
            $result = $this->User->login_authentication($post);
            if($result) {
                redirect('checkout');
            } else {
                $this->session->set_flashdata('dangerMsg', 'Wrong Credentials');
                redirect('user/login');
            }
        } else {
            $this->load->view('front/header');
            $this->load->view('front/login');
            $this->load->view('front/footer');
        }
    }

    public function register() {
        $this->load->view('front/header');
        $this->load->view('front/register');
        $this->load->view('front/footer');
    }

    public function save_user() {
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[users.email]', ['is_unique'=>'This email is already exists']);
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('terms', 'terms & conditions', 'required');
        if($this->form_validation->run()) {
            $post = $this->input->post();
            $result = $this->User->save_user($post);
            if($result) {
                redirect('user');
            }
        } else {
            $this->load->view('front/header');
            $this->load->view('front/register');
            $this->load->view('front/footer');
        }
    }

    public function logout() {
        $this->session->unset_userdata('login');
        $this->session->sess_destroy('login');
        redirect('user');
    }
} 