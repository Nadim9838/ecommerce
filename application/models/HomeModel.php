<?php defined('BASEPATH') or exit('No direct script access allowed');
class HomeModel extends CI_Model {
    // Get banners
    public function get_banner() {
        $query = $this->db->where('status', 1)->order_by('id', 'desc')->get('banner');
        if($query->num_rows()) {
            return $query->result();
        } else {
            return false;
        }
    }

    // Get categories
    public function get_category() {
        $query = $this->db->where('status', 1)->order_by('id', 'asc')->get('category');
        if($query->num_rows()) {
            return $query->result();
        } else {
            return false;
        }
    }

    // Get Products
    public function get_products() {
        $query = $this->db->where('status', 1)->order_by('id', 'asc')->get('product');
        if($query->num_rows()) {
            return $query->result();
        } else {
            return false;
        }
    }

    // Get Products category
    public function get_product_cat($catId) {
        $query = $this->db->select('cat_name, cat_id')->where(['status'=>1, 'cat_id'=>$catId])->get('category');
        if($query->num_rows()) {
            return $query->row()->cat_name;
        } else {
            return false;
        }
    }

    // Get Products
    public function product_url($slug) {
        $query = $this->db->where(['slug'=>$slug, 'status', 1])->get('product');
        if($query->num_rows()) {
            return $query->row();
        } else {
            return false;
        }
    }

    // Get parent category
     public function get_parent_category() {
        $query = $this->db->where(['status'=>1, 'parent_id'=>''])->get('category');
        if($query->num_rows()) {
            return $query->result();
        } else {
            return false;
        }
    }

    // Get sub category
    public function get_sub_category($parentId) {
        $query = $this->db->where(['status'=>1, 'parent_id'=>$parentId])->get('category');
        if($query->num_rows()) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_category_product($slug) {
        $query = $this->db->select('cat_id')->where('slug', $slug)->get('category');
        if($query->num_rows()) {
            return $query->row()->cat_id;
        } else {
            return false;
        }
    }

    public function fetch_product($catId) {
        $this->db->where("status", 1);
        $this->db->like('cat', $catId);
        $this->db->or_like('sub_cat', $catId);
        $query = $this->db->get('product');
        if($query->num_rows()) {
            return $query->result();
        } else {
            return false;
        }
    }
}