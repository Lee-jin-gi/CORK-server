<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    function __construct(){
        log_message("info", "Web-Model : Test Constructor");
        parent::__construct();
    }
	public function index()
	{
		// $this->load->model('Welcome_model');
		// $test_info = $this->Welcome_model->select_test();
		// $data["test_info"] = $test_info;

		// $this->load->model('Test_model');
		// $test_info = $this->Test_model->select_test();
		// $data["test_info"] = $test_info;
		// $this->load->view('/test/test_index', $data);

		// $this->load->model('Test_model');


		$board_list = $this->Test_model->select_board_list();
		$data["board_list"] = $board_list;

		$login_user_info = $this->Test_model->select_login_user_info();
		$data["login_user_info"] = $login_user_info;

		$board_reply_list = $this->Test_model->select_board_reply_list();
		$data["board_reply_list"] = $board_reply_list;

		// $super_admin_list = $this->Test_model->select_super_admin_list();
		// $data["super_admin_list"] = $super_admin_list;

		$law_info = $this->Test_model->select_law_info();
		$data["law_info"] = $law_info;

		$law_model_info = $this->Test_model->select_law_model_list();
		$data["law_model_info"] = $law_model_info;

		$debate_info = $this->Test_model->select_debate_info();
		$data["debate_info"] = $debate_info;

		$debate_reply_list = $this->Test_model->select_debate_reply_list();
		$data["debate_reply_list"] = $debate_reply_list;

		// $message_list = $this->Test_model->select_message_list();
		// $data["message_list"] = $message_list;


		$this->load->view('/test/test_index', $data);
	}
	public function insert_law(){
		// $this->load->model('Test_model');
		// $this->load->helper('url');

		$param = array(
			'd1' => 'TESTS',
			'd2' => 'TESTS1'
		);
//		echo("tes123123t");
//		print_r($param);
//		exit;
		$this->Test_model->insert_law($param);

		//redirect("/test");
		$data["check"] = "success";
        echo json_encode($data);
	}

	public function insert_law_model(){

		$param = array(
			'law_id' => 1,
			'title' => 'test',
			'content' => 'law_model',
			'reg_date' => date("Y-m-d", time())
		);

		$this->Test_model->insert_law_model($param);

		redirect("/test");
	}


}
