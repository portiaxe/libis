<?php
  class SupplierController extends CI_Controller  {
    public function __construct(){
    parent::__construct();

    $this->load->model("SupplierModel");
   }

    public function index(){
  	  $result = $this->SupplierModel->getSupplierList();
  	  $data['suppList'] = $result;
  	  $this->load->view("supplier",$data);

   }
   public function addSupplier() {
     $supplierName = $this->input->post('supplierName');
     $this->SupplierModel->addSupplier($supplierName);

     redirect('SupplierController');
   }

   public function editSupplier() {

        $id = $this->input->POST('id');
        $name = $this->input->POST('name');


      $this->load->model("SupplierModel");
      $this->SupplierModel->editSupplier($id,$name);
   }

   public function deleteSupplier() {
        $id = $this->input->POST('id');
        $this->SupplierModel->deleteSupplier($id);
   }

  }
 ?>
