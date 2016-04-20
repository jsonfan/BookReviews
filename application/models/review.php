<?php

	class Review extends CI_Model{

		public function add($review){
			$query = "INSERT INTO reviews (rating, comment, created_at, updated_at, book_id, user_id) VALUES (?, ?, NOW(), NOW(), ?, ?)";
			$values = array($review['rating'], $review['comment'], $review['book_id'], $review['user_id']);
			$this->db->query($query, $values);
		}

		public function delete($id){
			$query = "DELETE FROM reviews WHERE reviews.id = ?";

			return $this->db->query($query, array($id));
		}

		public function get_reviews_from_book_id($book_id){
			$query = "select books.title, books.author, reviews.rating, reviews.comment, reviews.user_id, reviews.created_at, users.alias, reviews.id
						FROM reviews
						LEFT JOIN books
						ON reviews.book_id = books.id
						LEFT JOIN users
						ON reviews.user_id = users.id
						WHERE books.id = ?
						ORDER BY created_at DESC";
			$values = array($book_id);
			return $this->db->query($query, $values)->result_array();
		}

		public function get_recent_reviews(){
			$query = "select books.title, reviews.rating, users.alias, reviews.created_at, reviews.comment, users.id as user_id
						FROM reviews
						LEFT JOIN users
						ON reviews.user_id = users.id
						LEFT JOIN books
						ON books.id = reviews.book_id
						ORDER BY created_at DESC";

			return $this->db->query($query)->result_array();
		}
	}
