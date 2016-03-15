<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

        class Model_User extends CI_Model {

            function __construct() {
            parent::__construct();
        }

        function all() {
            $query = $this->db->get('user');
            return $query->result();
        }
        
        function find($id) {
            $this->db->where('id', $id);
            return $this->db->get('user')->row();
        }
        
        function insert($register) {
            $this->db->set($register);
            $this->db->insert('user');
        }
        
        function update($register) {
            $this->db->set($register);
            $this->db->where('id', $register['id']);
            $this->db->update('user');
        }
        
        function delete($id) {
            $this->db->where('id', $id);
            $this->db->delete('user');
        }
        
        function get_login($user, $password) {
            $this->db->where('login', $user);
            $this->db->where('password', $password);
            return $this->db->get('user');
        }

 }

?>