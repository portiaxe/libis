<?php
    class AccessModel extends CI_Model{

      public function logUser($data){
        //  $query = $this->db->query('call getUser(?,?);',$data);
        $query = $this->db->query('call GetAccount(?,?);',$data);
          return $query->result();

      }

      public function getUserById($id){
        $query = $this->db->query('call GetAccountByID(?);',$id);
          return $query->result();
      }
    }

?>
