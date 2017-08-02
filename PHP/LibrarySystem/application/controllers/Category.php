<?php
  class Category extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model("CategoryModel");
    }


    public function getCategoryList(){
      $result = $this->CategoryModel->getCategoryList();
	    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($result));
    }
    public function getCategory($categ_id){}


    public function addCategory(){
      $data = json_decode(file_get_contents('php://input'), true);

      $this->CategoryModel->addCategory($data);

      //   $this->output
      //  ->set_content_type('application/json')
      //  ->set_output(json_encode($data));

    }
    public function deleteCategory(){
      $data = json_decode(file_get_contents('php://input'), true);


      // $category = array(
      //   'categ_id'=>(int)$data["categ_id"],
      //   'categ_code'=>$data["categ_code"],
      //   'categ_desc'=>$data["categ_desc"]
      // );

       $this->CategoryModel->deleteCategory($data["categ_id"]);
      //
      //  $this->output
      // ->set_content_type('application/json')
      // ->set_output(json_encode($category));
    }

    public function editCategory(){
      $data = json_decode(file_get_contents('php://input'), true);

      $category = array(
        'categ_id'=>(int)$data["id"],
        'categ_code'=>$data["code"],
        'categ_desc'=>$data["desc"]
      );

      $this->CategoryModel->editCategory($category);
    }
  }
