<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		// $this->load->model('Welcome_model');
		// $test_info = $this->Welcome_model->select_test();
		// $data["test_info"] = $test_info;
		// $this->load->view('welcome_message',$data);
		// echo "admin";
		$this->layout->setLayout("layout/admin_layout_view");
		$this->layout->view("/admin/main_view");
	}
	function test(){
		echo "test";
	}
}
