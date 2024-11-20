<?php defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('settingsModel');
    }
    public function pincode() {
        $this->form_validation->set_rules('pincode', 'Pincode', 'required|trim');
        $this->form_validation->set_rules('deliver_charge', 'Delivery Charges', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        if($this->form_validation->run()) {
            $post = $this->input->post();
            $result = $this->settingsModel->add_pincode($post);
            if($result) {
                $this->session->set_flashdata('successMsg', 'Pincode Added Successfully!!');
                redirect('settings/pincode');
            } else {
                $this->session->set_flashdata('dangerMsg', 'Pincode Insertion Failed!!');
                redirect('settings/pincode');

            }
        } else {
            $this->load->view('header');
            $this->load->view('pincode');
            $this->load->view('footer');
        }
    } //end pincode()

    public function banner() {
        if(empty($_FILES['banner_image']['name'])) {
            $this->form_validation->set_rules('banner_image', 'Banner Image', 'required|trim');
        }
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        if($this->form_validation->run()) {
            $post = $this->input->post();
            $config = ['upload_path'=> './images/banner_img',
                       'allowed_types' =>"gif|jpg|png|jpeg",
                      ];
            $this->load->library('upload', $config);
            $this->upload->do_upload('banner_image');
            $imageData = $this->upload->data();
            $post['banner_image'] = $imageData['file_name'];
            $result = $this->settingsModel->add_banner($post);
            if($result) {
                $this->session->set_flashdata('successMsg', 'Banner Added Successfully!!');
                redirect('settings/banner');
            } else {
                $this->session->set_flashdata('dangerMsg', 'Banner Insertion Failed!!');
                redirect('settings/banner');

            }
        } else {
            $this->load->view('header');
            $this->load->view('banner');
            $this->load->view('footer');
        }
    }

} //end controller