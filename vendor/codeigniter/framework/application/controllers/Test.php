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

  public function test_form(){
    $this->load->view('/test/test_form');
  }

  public function board(){
    $config['base_url'] = BASE_URL.'/test/board/page';
    $config['total_rows'] = $this -> Test_model -> get_board_content_count();
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

    $board_list = $this->Test_model->select_board_list($start, $limit);
    $data["board_list"] = $board_list;

    $this->load->view('/test/board', $data);
  }

  public function test_form_check(){

    $this->form_validation->set_rules('board_title', 'Title', 'trim|required');
    $this->form_validation->set_rules('board_content', 'Content', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');




		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('/test/test_form');
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

      $this->Test_model->insert_board_content($param);


      $data["check"] = "success";
      echo json_encode($data);
      redirect("/test/board");
		}
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


  public function insert_debate_content(){
    $param = array(
      'title' => '테스트',
      'content' => '내용 테스트',
      'reg_id' => '100',
      'reg_date' => date("Y-m-d H:i:s", time()),
      'file_id' => ''
    );

    $this->Test_model->insert_debate_content($param);

    //  redirect("/test");
    $data["check"] = "success";
      echo json_encode($data);
  }
  public function insert_debate_reply(){
    $param = array(
      'debate_id' => 3145665,
      'content' => '댓글222222',
      'reg_id' => '200',
      'reg_date' => date("Y-m-d H:i:s", time())
    );

    $this->Test_model->insert_debate_reply($param);

    //  redirect("/test");
    $data["check"] = "success";
      echo json_encode($data);
  }

  public function debate_content_backup(){
    $debate_id = 3145665;
    $debate_info = $this->Test_model->select_debate_info_by_id($debate_id);

    $debate_back_cnt = $this->Test_model->select_debate_back_cnt($debate_id);
    log_message("error", $debate_back_cnt);
    $seq = $debate_back_cnt + 1;

    $param = array(
      'debate_id' => $debate_info->id,
      'title' => $debate_info->title,
      'content' => $debate_info->content,
      'seq' => $seq
    );

    $this->Test_model->insert_debate_backup($param);

    $data["check"] = "backup success";
    echo json_encode($data);
  }

  public function update_debate_content(){
    $debate_id = 3145665;


    $param = array(
      'title' => 'RE 수정 테스트',
      'content' => 'RE 내용 수정 테스트',
      'upt_id' => '100',
      'upt_date' => date("Y-m-d H:i:s", time())
    );

    $this->Test_model->update_debate_content($debate_id, $param);

    $data["check"] = "update success";
    echo json_encode($data);
  }

  public function delete_debate_content(){
    $debate_id = 3145665;

    $param = array(
      'del_st' => 1,
      'del_id' => '100',
      'del_date' => date("Y-m-d H:i:s", time())
    );

    $this->Test_model->delete_debate_content($debate_id, $param);

    $data["check"] = "debate content delete success";
    echo json_encode($data);
  }
  public function delete_debate_reply(){
    $reply_id = 1;

    $param = array(
      'del_st' => 1,
      'del_id' => '100',
      'del_date' => date("Y-m-d H:i:s", time())
    );

    $this->Test_model->delete_debate_reply($reply_id, $param);

    $data["check"] = "reply delete success";
    echo json_encode($data);
  }

  public function update_debate_reply(){
    $reply_id = 1;

    $param = array(
      'content' => '수정 테스트',
      'upt_id' => '100',
      'upt_date' => date("Y-m-d H:i:s", time())
    );

    $this->Test_model->update_debate_reply($reply_id, $param);

    $data["check"] = "reply update success";
    echo json_encode($data);
  }

  public function view($board_id){
    $board_content = $this->Test_model->select_board_info($board_id);
    $data["board_content"] = $board_content;
    $this -> load -> view('/test/board_view', $data);
    // echo "글 제목 : " . $board_content->title . "<br>";
    // echo "글 작성자 : " . $board_content->reg_id . "<br>";
    // echo "글 작성시간 : " . $board_content->reg_date . "<br>";
    // echo "글 내용 : " . $board_content->content . "<br>";
  }

  public function edit($board_id){
    $board_content = $this->Test_model->select_board_info($board_id);
    $data["board_content"] = $board_content;
    $this -> load -> view('/test/board_edit', $data);
  }

  public function remove($board_id){
    $param = array(
      'del_st' => '1',
      'del_id' =>'100',
      'del_date' => date("Y-m-d H:i:s", time())
    );

    $this->Test_model->update_board_content($board_id, $param);

    redirect('/test/board');
  }

  public function edit_board_content(){
    $board_id = $_POST["id"];
    $param = array(
      'title' => $_POST["board_title"],
      'content' => $_POST["board_content"],
      'upt_id' => $_POST["user_id"],
      'upt_date' => date("Y-m-d H:i:s", time())
    );

    $this->Test_model->update_board_content($board_id, $param);
    $data["check"] = "board content update success";
    echo json_encode($data);

    redirect('/test/board');
  }

}
