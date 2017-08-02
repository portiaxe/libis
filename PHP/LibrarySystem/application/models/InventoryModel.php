<?php
  class InventoryModel extends CI_Model{
    public function getInventories(){
      $query = $this->db->query('call getInventories()');
      return $query->result();
    }
    public function getInventoriesWithCategory(){
      $query = $this->db->query('call getInventoriesWithCategory()');
      return $query->result();
    }
    public function getInventory($id){
        $query = $this->db->query("call getInventory($id)");
        return $query->result();
    }
    public function addInventory($data){
      $query = $this->db->insert('book_inventory', $data);
    }
    public function SearchInventory($data){
      $query = $this->db->query("call SearchInventory('$data')");
      return $query->result();
    }
    public function deleteInventory($id){
      if($id !=''){
          $query = $this->db->query("call DeleteInventory($id)");
      }
    }

  }
 ?>
