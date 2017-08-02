<?php
  class Borrower extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model("BorrowerModel");

    }


    public function getBorrowerList(){
      if($this->session->userdata('userid')==''){

      }else{
        $result = $this->BorrowerModel->getBorrowerList();
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));
      }
    }

    public function getBorrowerHistory($id){
      $result = $this->BorrowerModel->getBorrowerHistory($id);
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($result));
    }

  }
 ?>
