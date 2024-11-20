<?php defined('BASEPATH') or exit("No direct script allowed");

class SettingsModel extends CI_Model {
    // Insert new category
    public function add_pincode($post) {
        $query = $this->db->insert('pincode', $post);
        if($query) {
            return true;
        } else {
            return false;
        }
    }

    // Insert new banner
    public function add_banner($post) {
        $post['added_on'] = date('Y-m-d');
        $post['banner_id'] = mt_rand('11111', '99999');
        $query = $this->db->insert('banner', $post);
        if($query) {
            return true;
        } else {
            return false;
        }
    }
}