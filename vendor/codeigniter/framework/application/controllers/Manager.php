<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {
	public function index()
	{
		// $this->load->model('Welcome_model');
		// $test_info = $this->Welcome_model->select_test();
		// $data["test_info"] = $test_info;
		// $this->load->view('welcome_message',$data);
		// echo "manager";
		$this->layout->setLayout("layout/manager_layout_view");
		$this->layout->view("/manager/main_view");
	}
	function test(){
		echo "test";
	}
}
