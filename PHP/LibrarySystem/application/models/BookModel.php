<?php
    class BookModel extends CI_Model{

        public function getBooks(){
          $query = $this->db->query('call getBooks();');
          return $query->result();
        }
        public function getBook($id){
          $query = $this->db->query("call getBook($id);");
          return $query->result();
        }
        public function addBook($data){
          $query = $this->db->insert('book', $data);
        }

        public function editBook($data){
          $id = (int)$data["book_id"];
          $title = $data["book_title"];
          $author = $data["book_auth"];
          $publisher = $data["book_pub"];
          $query = $this->db->query("call editBook(?,?,?,?);",array($id,$title,$author,$publisher));
        }

        public function getBooksWithCategory(){
          $query = $this->db->query("call getBooksWithCategory();");
          return $query->result();
        }

        public function searchBook($data){
          $query = $this->db->query("call getBooksWithFilter(?);",$data);
          return $query->result();
        }

        public function deleteBook($id){
            $query = $this->db->query("call deleteBook($id);");
        }


    }
 ?>
