<?php
class error404 extends CI_Controller{
	public function index(){
		$this->load->view("override404");
	}
}
?>
