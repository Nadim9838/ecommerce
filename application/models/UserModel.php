<?php defined('BASEPATH') or exit('No direct script access allowed');
class UserModel extends CI_Model {
    public function save_user($post) {
        $data['user_id'] = mt_rand(11111,99999);
        $data['username'] = $post['name'];
        $data['email'] = $post['email'];
        $data['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
        $data['status'] = 1;
        $data['id'] = $_SERVER['REMOTE_ADDR'];
        $data['added_on'] = date('Y-m-d');

        $query = $this->db->insert('users', $data);
        if($query) {
            return true;
        } else {
            return false;
        }
    }

    public function login_authentication($post) {
        $email = $post['email'];
        $password = $post['password'];
        $query = $this->db->where(['email'=>$email, 'status'=> 1])->get('users');
        if($query->num_rows()) {
            $arr = $query->row();
            $dbPassword = $arr->password;
            if(password_verify($password, $dbPassword)) {
                $data['username'] = $arr->username;
                $data['email'] = $arr->email;
                $data['user_id'] = $arr->user_id;
                $this->session->set_userdata('login', $data);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}