<?php

  class Access extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model("AccessModel");

    }
    public function loguser(){
      $data = json_decode(file_get_contents('php://input'), true);

      $result = $this->AccessModel->loguser($data);
      $message ='';
      if(sizeof($result) >0){
        $user = array(
          "acc_id"=>$result[0]->lib_acc_id,
          "acc_username"=>$result[0]->user_name,
          "acc_type"=>$result[0]->user_type

        );
        $this->session->set_userdata($user);

        $message = array(
          "success"=> true,
          "message"=>"Login Succesful"
        );
      }else{
        $message = array(
          "success" => false,
          "message"=>"Invalid username or password"
        );
      }

      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($message));



    }

    public function testBorrowerLogin(){
      $user = array(
        "acc_id"=>1,
        "acc_username"=>"Jerico",
        "acc_type"=>"borrower"

      );
      $this->session->set_userdata($user);
    }
    public function testAdminLogin(){
      $user = array(
        "acc_id"=>1,
        "acc_username"=>"Jerico",
        "acc_type"=>"admin"

      );
      $this->session->set_userdata($user);
    }

    public function testLogout(){
      $this->session->unset_userdata('acc_id'); // $this->session->sess_destroy();
      $this->session->unset_userdata('acc_username');
      $this->session->unset_userdata('acc_type');
    }
    public function currentUser(){
      $user = array(
        "user_id" =>  $this->session->userdata('acc_id'),
        "user_name" =>  $this->session->userdata('acc_username'),
        "user_type" =>  $this->session->userdata('acc_type'),
      );
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($user));
    }
    public function getProfile(){
      $id = $this->session->userdata('acc_id');
      $user = $this->AccessModel->getUserById($id);
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($user));
    }

  }
?>
