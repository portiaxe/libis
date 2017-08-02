<?php
    class BorrowModel extends CI_Model{

        public function getBorrowLogList(){
          $query = $this->db->query('call getBorrowLogList();');
          return $query->result();
        }


    }
 ?>
