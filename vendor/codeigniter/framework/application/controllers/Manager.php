<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {
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


		$this->layout->setLayout("layout/manager_layout_view");
	}
	public function index()
	{
		// $this->load->model('Welcome_model');
		// $test_info = $this->Welcome_model->select_test();
		// $data["test_info"] = $test_info;
		// $this->load->view('welcome_message',$data);
		// echo "manager";

		$this->layout->view("/manager/main_view");
	}
	function test(){
		echo "test";
	}
}
