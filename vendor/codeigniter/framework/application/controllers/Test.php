<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	public function index()
	{
		// $this->load->model('Welcome_model');
		// $test_info = $this->Welcome_model->select_test();
		// $data["test_info"] = $test_info;

		$this->load->model('Test_model');
		$test_info = $this->Test_model->select_test();
		$data["test_info"] = $test_info;
		$this->load->view('/test/test_index', $data);
	}
}
