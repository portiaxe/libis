<?php
    class BorrowerModel extends CI_Model{

      public function getBorrowerList(){
        $query = $this->db->query('call getBorrowerList();');
        return $query->result();
      }

      public function getBorrowerHistory($id){
        $query = $this->db->query('call getBorrowerHistory(?);',array($id));
        return $query->result();
      }
    }
 ?>
