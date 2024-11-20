<?php defined('BASEPATH') or exit('No direct script access allowed');
class Checkout extends CI_Controller{
    public function __construct() {
        parent::__construct();
        if(!empty($this->session->userdata('login'))) {
            echo "Checkout Page";
        } else {
            redirect('user');
        }
    }


    public function index() {

    }
}