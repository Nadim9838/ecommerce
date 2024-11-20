<?php defined('BASEPATH') or exit('No direct script access allowed');
class CartModel extends CI_Model {
    // Add products in cart
    public function add_to_cart($post, $userId) {
        $productExist = $this->db->where(['product_id'=>$post['product_id'], 'user_id'=>$userId])->get('cart');
        if($productExist->num_rows()) {
            return "exist";
        } else {
            $product = $this->db->select('product_name, mrp, selling_price, slug, pro_main_image')->where('product_id', $post['product_id'])->get('product'); 
            if($product->num_rows()) {
                $r=$product->row();
                $data['cart_id'] = mt_rand(11111,99999);
                $data['user_id'] = $userId;
                $data['product_id'] = $post['product_id'];
                $data['product_name'] = $r->product_name;
                $data['product_image'] = $r->pro_main_image;
                $data['product_qty'] = $post['product_qty'];
                $data['mrp'] = $r->mrp;
                $data['selling_price'] = $r->selling_price;
                $data['slug'] = $r->slug;
                $data['added_on'] = date('Y-m-d');
                $this->db->insert('cart', $data);
                return "added";
            } else {
                return false;
            }
        }
    }

    // Get cart details
    public function get_cart_details($userId) {
        $query = $this->db->where('user_id', $userId)->get('cart');
        if($query->num_rows()) {
            return $query->result();
        } else {
            return false;
        }
    }

    // Update quantity in cart
    public function update_cart($post, $userId) {
        $count = count($post);
        for($i=0; $i<=$count; $i++) {
            $query = $this->db->where(['product_id'=>$post['product_id'][$i], 'user_id'=>$userId])->update('cart', ['product_qty'=>$post['update_qty'][$i]]);
        }
        
        return true;
    }

    // Delete quantity from cart
    public function delete_cart($productId, $userId) {
        $query = $this->db->where(['product_id'=>$productId, 'user_id'=>$userId])->delete('cart');
        if($query) {
            return true;
        } else {
            return false;
        }
    }

    // Get cart details
    public function get_total_price($userId) {
        $query = $this->db->select('sum(selling_price)*product_qty as total_price')->where('user_id', $userId)->get('cart');
        if($query->num_rows()) {
            $productPrice = $query->row()->total_price;
            if($productPrice < 499) {
                $totalPrice = $productPrice + 40;
                return ['subtotal'=>$productPrice, 'total'=>$totalPrice];
            } else {
                $totalPrice = $productPrice + 0;
                return ['subtotal'=>$productPrice, 'total'=>$totalPrice];
            }
        } else {
            return false;
        }
    }
}