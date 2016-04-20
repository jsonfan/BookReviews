<?

	class User extends CI_Model{


		public function add_user($user){
			$query = "INSERT INTO users (name, alias, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
			$values = array($user['name'], $user['alias'], $user['email'], $user['password']);
			return $this->db->query($query, $values);
		}

		public function get_user_by_email($post){
			$query = "SELECT * from users WHERE email = ?";
			$values = array($post['email']);
			return $this->db->query($query, $values)->row_array();
		}

		public function get_user_by_id($id){
			$query = "SELECT users.alias, users.name, users.email, books.title, books.id as book_id FROM reviews
						LEFT JOIN books on reviews.book_id = books.id
						LEFT JOIN users on reviews.user_id = users.id
						WHERE reviews.user_id = ?";

			return $this->db->query($query, array($id))->result_array();

		}


	}