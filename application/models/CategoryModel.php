<?php defined('BASEPATH') or exit("No direct script allowed");

class CategoryModel extends CI_Model {
    // Insert new category
    public function add_category($post) {
        $post['added_on'] = date('d-m-Y');
        $post['cat_id'] = mt_rand(11111,99999);
        $post['slug'] = $this->slug($post['cat_name']);
        $query = $this->db->insert('category', $post);
        if($query) {
            return true;
        } else {
            return false;
        }
    }

    // To create slug
    private function slug($string) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
        return $slug;
    }

    // To get all categories
    public function get_all_category() {
        $this->db->where(['status' => 1, 'parent_id' => '']);
        $query = $this->db->get('category');
        if($query->num_rows()) {
            return $query->result();
        }
    }

    // To get all categories
    public function get_sub_category($catId) {
        $this->db->where(['status' => 1, 'parent_id' => $catId]);
        $query = $this->db->get('category');
        if($query->num_rows()) {
            $output = '';
            foreach($query->result() as $r) {
                $output .= "<option value='".$r->cat_id."'>".$r->cat_name."</option>";
            }
            echo $output;
        }
    }
}