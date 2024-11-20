<?php defined('BASEPATH') or exit("No direct script allowed");

class ProductModel extends CI_Model {
    // Insert new prodct
    public function add_product($post) {
        $post['added_on'] = date('d-m-Y');
        $post['slug'] = $this->slug($post['product_name']);
        $query = $this->db->insert('product', $post);
        if($query) {
            $this->session->unset_userdata('product_id');
            return true;
        } else {
            return false;
        }
    }
    // To get all categories
    public function get_all_product() {
        $this->db->where(['status' => 1, 'parent_id' => '']);
        $query = $this->db->get('category');
        if($query->num_rows()) {
            return $query->result();
        }
    }

    // Create slug url
    private function slug($string) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
        return $slug;
    }
}