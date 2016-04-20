<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReviewController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Review');
		$this->output->enable_profiler(TRUE);
	}


	public function add(){
		$review = $this->input->post();
		$this->Review->add($review);
		redirect('/main/welcome');
	}

	public function show($id){
		//getreviewsfrombookid
		//load into view
		$reviews = $this->Review->get_reviews_from_book_id($id);
		$view_data['reviews'] = $reviews;
		$view_data['book_id'] = $id;
		$this->load->view('show_book_view', $view_data);
	}

	public function delete($id){
		$this->Review->delete($id);
		redirect('/main/welcome');
	}

}