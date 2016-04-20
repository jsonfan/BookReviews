<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BookController extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Book');
		$this->load->model('Review');
		$this->output->enable_profiler(TRUE);
	}

	public function index(){
		//send unique authors list
		$authors = $this->Book->get_distinct_authors();
		$view_data['authors'] = $authors;
		$this->load->view('add_book_view', $view_data);
	}

	public function create(){
		$post = $this->input->post();
		//if new author length > 0 post[author] = post[new_author]
		if(strlen($post['new_author']) > 0){
			$post['author'] = $post['new_author'];
		}

		$post['book_id'] = $this->Book->add($post);
		//go to review add
		$this->Review->add($post);
		$showRoute = "/reviewcontroller/show/".$post['book_id'];
		redirect($showRoute);
	}
}