<?php
  class UserModel extends CI_Model{
    function getUserList(){
      $query = $this->db->get('user');
      return $query->result();
    }
    function getUser($id){

    }
  }
