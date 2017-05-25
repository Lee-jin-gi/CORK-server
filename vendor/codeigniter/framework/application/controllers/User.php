<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct() {
		parent::__construct ();
		set_language();
		$this->version = "alpha/";
		$this->category = "intro/";
		$this->layout_path = $this->version."layout/";
		$this->view_path = $this->version.$this->category;

		$this->layout->setLayout($this->layout_path."intro_layout_view");
	}
	public function index()
	{
		// $this->load->model('Welcome_model');
		// $test_info = $this->Welcome_model->select_test();
		// $data["test_info"] = $test_info;
		// $this->load->view('welcome_message',$data);
		// echo "user";
		$this->layout->setLayout("layout/user_layout_view");
		$this->layout->view("/user/main_view");
	}
	function test(){
		echo "test";
	}
}
