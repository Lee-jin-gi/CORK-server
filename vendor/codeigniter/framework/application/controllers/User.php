<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function index()
	{
		// $this->load->model('Welcome_model');
		// $test_info = $this->Welcome_model->select_test();
		// $data["test_info"] = $test_info;
		// $this->load->view('welcome_message',$data);
		echo "user";
	}
	function test(){
		echo "test";
	}
}