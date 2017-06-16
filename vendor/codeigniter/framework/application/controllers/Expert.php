<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expert extends CI_Controller {

	function __construct() {
		parent::__construct ();

		// Expert, Manager, Admin 
		$allow_ip =
		array(
				"127.0.0.1", "0:0:0:0:0:0:0:1", "::1"
		);
		if (in_array($this->input->ip_address(), $allow_ip)) {

		}else{
			show_error("해당 접속IP는 승인된IP가 아닙니다.");
		}


		$this->layout->setLayout("layout/expert_layout_view");

	}
	public function index()
	{
		// $this->load->model('Welcome_model');
		// $test_info = $this->Welcome_model->select_test();
		// $data["test_info"] = $test_info;
		// $this->load->view('welcome_message',$data);
		// echo "expert";

		$this->layout->view("/expert/main_view");
	}
	function test(){
		echo "test";
	}

	function book_mark(){
		$action = $this->uri->segment(3);

		if($action == "list"){
			$this->book_mark_list();
		}
	}

	function book_mark_list(){
		$user_id = 100;

		$config['base_url'] = '/expert/book_mark/list/page';
		$config['total_rows'] = $this->Expert_model->get_book_mark_count($user_id);
		$config['per_page'] = 50;
		$config['uri_segment'] = 5;
		$config['num_links'] = 4;

		$config['prev_tag_open'] = "<li class='waves-effect'><i class='material-icons'>";
		$config['prev_tag_close'] = "</i></li>";
		$config['next_tag_open'] = "<li class='waves-effect'><i class='material-icons'>";
		$config['next_tag_close'] = "</i></li>";
		$config['num_tag_open'] = "<li class='waves-effect'>";
		$config['num_tag_close'] = "</li>";
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['cur_tag_open'] = "<li class='active'><a href='#'>";
		$config['cur_tag_close'] = "</a></li>";


		$this->pagination->initialize($config);
		$data['pagination'] = $this -> pagination -> create_links();


		$page = $this -> uri -> segment(5,1);

		if($page > 1){
			$start = (($page / $config['per_page'])) * $config['per_page'];
		} else {
			$start = ($page - 1) * $config['per_page'];
		}

		$limit = $config['per_page'];


		$book_mark_list = $this->Expert_model->select_book_mark_list($start, $limit, $user_id);
		$data["book_mark_list"] = $book_mark_list;
		$this->layout->setLayout("layout/expert_layout_view");
		$this->layout->view('/expert/book_mark_list_view', $data);
	}
}
