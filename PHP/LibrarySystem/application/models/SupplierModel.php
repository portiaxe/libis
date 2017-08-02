<?php
  class SupplierModel extends CI_model{

      public function getSupplierList() {
         $query = $this->db->get('supplier');
         return $query->result();
      }

      public function addSupplier($name) {
        $data = array(
          'suppliername'=>$name
        );

        $query = $this->db->insert('supplier', $data);
      }

      public function editSupplier($id,$name) {
        $data = array(
          'suppliername'=>$name,
        );

        $this->db->where('supplierid', $id);
        $this->db->update('supplier', $data);
      }

      public function deleteSupplier($id) {
        $this->db->delete('supplier', array('supplierid' => $id));

      }

  }
 ?>
