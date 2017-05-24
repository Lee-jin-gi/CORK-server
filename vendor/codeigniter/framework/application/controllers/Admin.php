<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
    parent::__construct ();
		$this->global_data["page"] = "admin";
	}
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

	function board(){
		$action = $this->uri->segment(3);

		if($action == "list"){
			$this->board_list();
		}else if($action == "info"){
			$this->board_info($this->input->get("bid"));
		}else if($action == "write"){
			$this->board_write();
		} else if($action == "add"){
			$this->board_add();
		} else if($action == "edit"){
			$this->board_edit($this->input->get("bid"));
		} else if ($action == "update"){
			$param = array(
				'title' => $this->input->post("board_title"),
				'content' => $this->input->post("board_content"),
				'upt_id' => $this->input->post("user_id"),
				'upt_date' => date("Y-m-d H:i:s", time())
			);
			$this->board_update($this->input->get("bid"), $param);
		}else if($action == "remove"){
			$this->board_remove($this->input->get("bid"));
		}

		//list
		//info
		//write
		//add
		//edit
		//update
		//remove
		else{
			show_404();
		}
	}


	/**
		전체 게시판
	*/
	function board_list(){
		$config['base_url'] = '/admin/board/list/page';
    $config['total_rows'] = $this->Admin_model->get_board_content_count();
    $config['per_page'] = 50;
    $config['uri_segment'] = 4;
    $config['num_links'] = 3;


    $this->pagination->initialize($config);
    $data['pagination'] = $this -> pagination -> create_links();



    $page = $this -> uri -> segment(4,1);

    if($page > 1){
      $start = (($page / $config['per_page'])) * $config['per_page'];
    } else {
      $start = ($page - 1) * $config['per_page'];
    }

    $limit = $config['per_page'];

    $board_list = $this->Admin_model->select_board_list($start, $limit);
    $data["board_list"] = $board_list;
		$this->layout->setLayout("layout/admin_layout_view");
    $this->layout->view('/admin/board_list_view', $data);
	}

	function board_info($id){
		$board_content = $this->Admin_model->select_board_info($id);
		$data["board_content"] = $board_content;
		$this -> load -> view('/admin/board_info_view', $data);
	}


	function board_write(){
		$this->layout->setLayout("layout/admin_layout_view");
    $this->layout->view('/admin/board_write_view');
	}
	function board_add(){

		    $this->form_validation->set_rules('board_title', 'Title', 'trim|required');
		    $this->form_validation->set_rules('board_content', 'Content', 'trim|required|max_length[100]');
		    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');




				if ($this->form_validation->run() == FALSE)
				{
					$this->load->view('/admin/board/write');
				}
				else
				{

		      $param = array(
		        'title' => $_POST["board_title"],
		        'content' => $_POST["board_content"],
		        'reg_id' => $_POST["user_id"],
		        'reg_date' => date("Y-m-d H:i:s", time()),
		        'file_id' => ''
		      );

		      $this->Admin_model->insert_board_content($param);


		      $data["check"] = "success";
		      echo json_encode($data);
		      redirect("/admin/board/list");
				}
	}
	public function board_edit($id){
		$board_content = $this->Admin_model->select_board_info($id);
		$data["board_content"] = $board_content;
		$this -> load -> view('/admin/board_edit_view', $data);
	}



	public function board_update($id, $param){
		$this->Admin_model->update_board_content($id, $param);
		$data["check"] = "board content update success";
		//echo json_encode($data);

		redirect('/admin/board/list');
	}


	public function board_remove($id){
		$param = array(
			'del_st' => '1',
			'del_id' =>'100',
			'del_date' => date("Y-m-d H:i:s", time())
		);

		$this->Admin_model->update_board_content($id, $param);

		redirect("admin/board/list");
	}
}
