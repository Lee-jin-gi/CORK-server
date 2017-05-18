<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expert extends CI_Controller {
	public function index()
	{
		// $this->load->model('Welcome_model');
		// $test_info = $this->Welcome_model->select_test();
		// $data["test_info"] = $test_info;
		// $this->load->view('welcome_message',$data);
		// echo "expert";
		$this->layout->setLayout("layout/expert_layout_view");
		$this->layout->view("/expert/main_view");
	}
	function test(){
		echo "test";
	}
}
