<?php
  class Borrow extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model("BorrowModel");

    }



    public function getBorrowLogList(){
      $result = $this->BorrowModel->getBorrowLogList();
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($result));
    }




  }
 ?>
