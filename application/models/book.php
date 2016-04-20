<?php

	class Book extends CI_Model{

		public function add($book){
			$query = "INSERT INTO books (title, author, user_id, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
			$values = array($book['title'], $book['author'], $book['user_id']);

			$this->db->query($query, $values);

			return $this->db->insert_id();
		}

		public function get_distinct_authors(){
			return $this->db->query("SELECT DISTINCT author from books")->result_array();
		}

		public function get_all_books(){
			return $this->db->query("SELECT books.id, books.title FROM books")->result_array();
		}
	}
