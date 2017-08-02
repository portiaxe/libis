<?php
  class BookInventory extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->model("InventoryModel");
    }
    public function addInventory($bookid,$bookcode){
      $data =array(
        'book_id'=>$bookid,
        'book_code'=>$bookcode,
        'status'=>'available'
      );
        $this->InventoryModel->addInventory($data);
    }
  // public function addInventory(){
  //     $id = $this->input->post('book_id');
  //     $code = $this->input->post('book_code');
  //
  //     $data =array(
  //       'book_id'=>$id,
  //       'book_code'=>$code,
  //       'status'=>'borrowed'
  //     );
  //
  //     $this->InventoryModel->addInventory($data);
  //
  //   }
    public function SearchInventory($data =''){
      $result = $this->InventoryModel->SearchInventory($data);
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($result));
    }
    public function getInventoryList(){
      $result = $this->InventoryModel->getInventories();
	    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($result));
    }
    public function getInventory($id){
      $result = $this->InventoryModel->getInventory($id);
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($result));
    }

    public function deleteInventory($id =''){
      $this->InventoryModel->deleteInventory($id);
    }
    public function getInventoriesWithCategory(){
      $result = $this->InventoryModel->getInventoriesWithCategory();
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($result));
    }


  }
?>
