<?php
  class CategoryModel extends CI_Model{

    public function getCategoryList(){
      $query = $this->db->get('category');
      return $query->result();
    }
    public function addCategory($data){
      $category = array(
                  'categ_code' => $data["code"],
                  'categ_desc' =>$data["desc"]);
      $query = $this->db->insert('category', $category);
    }

    public function editCategory($data){
      $query = $this->db->query('call editCategory(?,?,?)',$data);
    }
    public function deleteCategory($data){
      $query = $this->db->query('call deleteCategory(?)',$data);
      //var_dump($query->result());
    }
  }
 ?>
