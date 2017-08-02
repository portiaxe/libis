<?php
  class Book extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model("BookModel");

    }

    public function store(){
    	$_POST = json_decode(file_get_contents('php://input'), true);
    	$insert = $this->input->post();
  		$this->db->insert('items', $insert);
  		$id = $this->db->insert_id();
  		$q = $this->db->get_where('items', array('id' => $id));
  		echo json_encode($q->row());
    }
    public function getBooks(){
      if( $this->session->userdata('acc_type') != 'admin')
        header('HTTP/1.0 403 Forbidden');
      else{
         $result = $this->BookModel->getBooks();
         $this->output
         ->set_content_type('application/json')
         ->set_output(json_encode($result));
      }



    }

    public function getBook($id){
      if(isset($id)){
        $result = $this->BookModel->getBook($id);

        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));
      }
    }
    public function getBooksWithCategory(){
      $result = $this->BookModel->getBooksWithCategory();
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($result));
    }

    /*data passed to codeiginter using angular cannot fetch $this->input->post()
      but can be fetch using regular form submit or $.post() in jquery*/
    public function addBook(){
        // $title = $this->input->post('book_title');
        // $author = $this->input->post('book_auth');
        // $publisher = $this->input->post('book_pub');
        //
        // $data =array(
        //   'book_title'=>$title,
        //   'book_auth'=>$author,
        //   'book_pub'=>$publisher
        // );

        // $this->output
        // ->set_content_type('application/json')
        // ->set_output(json_encode($data));

  	    $data = json_decode(file_get_contents('php://input'), true);

      //   $this->output
      //  ->set_content_type('application/json')
      //  ->set_output(json_encode($data));

      //  var_dump($data);
        $this->BookModel->addBook($data);

      }

      /*To do: Clean the codes for security purposes*/
      public function deleteBook(){
        $data = json_decode(file_get_contents('php://input'), true);
      //   $this->output
      //  ->set_content_type('application/json')
      //  ->set_output(json_encode($data));
        $this->BookModel->deleteBook($data['book_id']);
      }

      public function editBook(){
       $data = json_decode(file_get_contents('php://input'), true);
      //  $this->output
      //   ->set_content_type('application/json')
      //   ->set_output(json_encode($data));
       $this->BookModel->editBook($data);
      }

      //default value is empty string to avoid error when parameter is null
      public function searchBook($data =""){
        $result = $this->BookModel->searchBook($data);
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));
      }



  }
 ?>
