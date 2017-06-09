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

/**
*
	@function	: book_mark
						-	북마크 관련 함수
	@var status : 북마크 - DB에 등록 되어있는지 확인하는 변수
						0 = 처음 등록하는 경우
						!0 = 이미 등록된 이력이 있는 경우
	@var chg_st	: 북마크 상태 변수
						on = 북마크 등록
						!on = 북마크 등록 취소
*
**/
	function book_mark(){
		$chg_st = $this->input->post("chg_st");
		$debate_id = $this->input->post("debate_id");
		$user_id = $this->input->post("user_id");

		$status = $this->get_bm_status($debate_id, $user_id);
		if($chg_st == 'on'){
			$chg_st = 1;
		}else{
			$chg_st = 0;
		}
		if($status == "0"){
			//insert
			$param = array(
				'debate_id' => $debate_id,
				'user_id' => $user_id,
				'reg_id' => $user_id,
				'reg_date' => date("Y-m-d H:i:s", time()),
				'chg_st' => $chg_st,
				'chg_date' => date("Y-m-d H:i:s", time())
			);
			$this->insert_book_mark($debate_id, $param);
		}else{
			//update
			$param = array(
				'upt_id' => $user_id,
				'upt_date' => date("Y-m-d H:i:s", time()),
				'chg_st' => $chg_st,
				'chg_date' => date("Y-m-d H:i:s", time())
			);
			$this->update_book_mark($param, $debate_id, $user_id);
		}
	}

/**
*
	@function : get_bm_status
						- DB에 북마크 등록 이력이 있는지 확인하는 함수
						bm = bookmark
*
**/
	function get_bm_status($debate_id, $user_id){

		$bm_status = $this->Admin_model->get_bm_status($debate_id, $user_id);

		if(isset($bm_status)){
			if($bm_status -> chg_st == 1){
				return "exist_1";
			}else if($bm_status -> chg_st == 0){
				return "exist_0";
			}
		}else{
			return "0";
			// 이 경우 insert 해주면 됨
		}
	}


	function insert_book_mark($debate_id, $param){
		$this->Admin_model->insert_book_mark($param);
		redirect ("/admin/debate/info?bid=$debate_id");
	}


	function update_book_mark($param, $debate_id, $user_id){
		$this->Admin_model->update_book_mark($param, $debate_id, $user_id);
		redirect ("/admin/debate/info?bid=$debate_id");
	}

	/**
	*
		@function : join()
							- 회원 관리 관련 함수
	*
	**/
	function join(){
		$action = $this->uri->segment(3);

		if($action == "sns"){
			$this->join_sns();
		}else if($action == "response"){
			$app_id = $this->input->get("app_id");
			$user_name = $this->input->get("name");
			$sns = $this->input->get("sns");

			$this->user_sns_insert($app_id, $sns);

		}
		else{
			show_404();
		}
	}

	/**
	*
	@function : user_sns_insert
							- SNS 로그인 후 해당 정보 불러오는 함수
	*
	**/
	function user_sns_insert($app_id, $sns){
		$user_sns_status = $this->Admin_model->get_sns_status($app_id, $sns);

		if(isset($user_sns_status)){
			echo "ID 존재<br>";
			echo "User ID : $user_sns_status->tb_user_id<br>SNS : $user_sns_status->sns_code<br>App_ID : $user_sns_status->sns_token<br>Reg_Date : $user_sns_status->reg_date";
		}else{
			echo "ID 존재 x";
			// 이 경우 insert 해주면 됨
			$param = array(
				'sns_code' => $sns,
				'sns_token' => $app_id,
				'tb_user_id' => 100,
				'reg_id' => 100,
				'reg_date' => date("Y-m-d H:i:s", time())
			);
			$this->Admin_model->insert_sns_info($param);
		}

	}


	function join_sns(){
		$this->layout->setLayout("layout/admin_layout_view");
		$this->layout->view('/admin/sign_up_view');
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
			$code = 600;
			$this->board_add($code);
		} else if($action == "edit"){
			$this->board_edit($this->input->get("bid"));
		} else if ($action == "update"){
			$code = 601;
			$param = array(
				'title' => $this->input->post("board_title"),
				'content' => $this->input->post("board_content"),
				'upt_id' => $this->input->post("user_id"),
				'upt_date' => date("Y-m-d H:i:s", time())
			);
			$this->board_update($this->input->get("bid"), $param, $code, $_POST["user_id"]);
		}else if($action == "remove"){
			$code = 602;
			$this->board_remove($this->input->get("bid"), $code);
		}else if($action == "reply"){
			$code = 700;
			$this->board_reply($this->input->get("bid"), $code);
		}else if($action == "download"){
			$this->board_download();
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

	function debate(){
		$action = $this->uri->segment(3);

		if($action == "list"){
			$this->debate_list();
		}else if($action == "info"){
			$this->debate_info($this->input->get("bid"));
		}else if($action == "write"){
			$this->debate_write();
		}else if($action == "add"){
			$code = 650;
			$this->debate_add($code);
		} else if($action == "edit"){
			$this->debate_edit($this->input->get("bid"));
		} else if ($action == "update"){
			$code = 651;
			$param = array(
				'title' => $this->input->post("debate_title"),
				'content' => $this->input->post("debate_content"),
				'upt_id' => $this->input->post("user_id"),
				'upt_date' => date("Y-m-d H:i:s", time())
			);
			$this->debate_update($this->input->get("bid"), $param, $code, $_POST["user_id"]);
		}else if($action == "remove"){
			$code = 652;
			$this->debate_remove($this->input->get("bid"), $code);
		}else if($action == "reply"){
			$code = 750;
			$this->debate_reply($this->input->get("bid"), $code);
		}else if($action == "download"){
			$this->debate_download();
		}

		else{
			show_404();
		}

	}

	function user(){
		$action = $this->uri->segment(3);
		$type = $this->input->get("type");

		if($action == "list"){
			$this->user_list($type);
		}else if($action == "info"){
			$this->user_info($this->input->get("bid"));
		}else if($action == "edit"){
			$this->user_edit($this->input->get("bid"));
		}else if($action == "update"){
			$code = 3;
			$param = array(
				'user_code' => $this->input->post("user_code"),
				'expire_date' => $this->input->post("expire_date"),
				'upt_id' => $this->input->get("bid"),
				'upt_date' => date("Y-m-d H:i:s", time())
			);

			$this->user_update($_GET["bid"], $param, $code);
		}else if($action == "reset"){
			$code = 4;
			$this->user_reset($this->input->get("bid"), $code);
		}else if($action == "download"){
			$this->user_download($type);
		}


		else{
			show_404();
		}
	}

function user_list($type){
	// 페이징 관련 설정
	$config['page_query_string'] = TRUE;
	$config['base_url'] = "/admin/user/list?type=$type";
	$config['total_rows'] = $this->Admin_model->get_user_count($type);
	$config['per_page'] = 50;
	$config['uri_segment'] = 4;
	$config['num_links'] = 3;

	// 페이징 태그 커스터마이징
	$config['prev_tag_open'] = "<li class='waves-effect'><i class='material-icons'>";
	$config['prev_tag_close'] = "</i></li>";
	$config['next_tag_open'] = "<li class='waves-effect'><i class='material-icons'>";
	$config['next_tag_close'] = "</i></li>";
	$config['num_tag_open'] = "<li class='waves-effect'>";
	$config['num_tag_close'] = "</li>";
	$config['first_link'] = FALSE;
	$config['last_link'] = FALSE;
	$config['cur_tag_open'] = "<li class='active'><a href='#'>";
	$config['cur_tag_close'] = "</a></li>";

	$this->pagination->initialize($config);
	$data['pagination'] = $this -> pagination -> create_links();



	if(empty($this->input->get("per_page"))){
		$page = 1;
	}else{
		$page =$this->input->get("per_page");
	}


	if($page > 1){
		$start = (($page / $config['per_page'])) * $config['per_page'];
	} else {
		$start = ($page - 1) * $config['per_page'];
	}

	$limit = $config['per_page'];

	$user_count_per_month = $this->Admin_model->get_user_count_per_month();
	$data["user_count_per_month"] = $user_count_per_month;


	$user_list = $this->Admin_model->select_user_list($start, $limit, $type);


	$data["user_list"] = $user_list;
	$this->layout->setLayout("layout/admin_layout_view");
	$this->layout->view('/admin/user_list_view', $data);
}


	/**
	*
		각 카테고리 Excel로 다운로드 하는 함수
	*
	**/
	function board_download(){
		$board_list = $this->Admin_model->select_board_list(0, 50);

		$this->excel->setActiveSheetIndex(0);		// 워크시트에서 1번째는 활성화
		$this->excel->getActiveSheet()->setTitle('report_board_list');		// 워크시트 이름 지정

		$this->excel->getActiveSheet()->mergeCells('B2:F2');
		$this->excel->getActiveSheet()->getStyle('B2:F3')->getFont()->setSize(16)->setBold(true);
		$this->excel->getActiveSheet()->setCellValue('B2', "Board List" );
		$this->excel->getActiveSheet()->setCellValue('B3', "Board No" );
		$this->excel->getActiveSheet()->setCellValue('C3', 'Title');
		$this->excel->getActiveSheet()->setCellValue('D3', 'Reply_count');
		$this->excel->getActiveSheet()->setCellValue('E3', 'Reg_id');
		$this->excel->getActiveSheet()->setCellValue('F3', 'Reg_date');
		$index = 4;
		$status = "";
		foreach($board_list as $row){
			$this->excel->getActiveSheet()->setCellValue('B'.$index, $row->id);
			$this->excel->getActiveSheet()->setCellValue('C'.$index, $row->title);
			$this->excel->getActiveSheet()->setCellValue('D'.$index, $row->reply_cnt);
			$this->excel->getActiveSheet()->setCellValue('E'.$index, $row->reg_id);
			$this->excel->getActiveSheet()->setCellValue('F'.$index, $row->reg_date);
			$index ++;
		}

		// 컬럼 width auto
		$this->excel->getActiveSheet()->getColumnDimensionByColumn("A")->setWidth('2');
		foreach(range('B','Z') as $columnID) {
			//$this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
			$this->excel->getActiveSheet()->getColumnDimension($columnID)->setWidth('20');
		}
		$this->excel->getActiveSheet()->calculateColumnWidths();

		$this->excel->setActiveSheetIndex(0);

		$times = time();  // 현재 서버의 시간을 timestamp 값으로 가져옴
		$date = date("ynjGis", $times);

		$filename='Board_list_'.$date.'.xlsx'; // 엑셀 파일 이름
		header("Content-Encoding: utf-8");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8'); //mime 타입
		header('Content-Disposition: attachment;filename="'.$filename.'"'); // 브라우저에서 받을 파일 이름
		header('Cache-Control: max-age=0'); //no cache

		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}

	function debate_download(){
		$debate_list = $this->Admin_model->select_debate_list(0, 50);

		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('report_debate_list');

		$this->excel->getActiveSheet()->mergeCells('B2:F2');
		$this->excel->getActiveSheet()->getStyle('B2:F3')->getFont()->setSize(16)->setBold(true);
		$this->excel->getActiveSheet()->setCellValue('B2', "Debate List" );
		$this->excel->getActiveSheet()->setCellValue('B3', "Debate No" );
		$this->excel->getActiveSheet()->setCellValue('C3', 'Title');
		$this->excel->getActiveSheet()->setCellValue('D3', 'Reply_count');
		$this->excel->getActiveSheet()->setCellValue('E3', 'Reg_id');
		$this->excel->getActiveSheet()->setCellValue('F3', 'Reg_date');
		$index = 4;
		$status = "";
		foreach($debate_list as $row){
			$this->excel->getActiveSheet()->setCellValue('B'.$index, $row->id);
			$this->excel->getActiveSheet()->setCellValue('C'.$index, $row->title);
			$this->excel->getActiveSheet()->setCellValue('D'.$index, $row->reply_cnt);
			$this->excel->getActiveSheet()->setCellValue('E'.$index, $row->reg_id);
			$this->excel->getActiveSheet()->setCellValue('F'.$index, $row->reg_date);
			$index ++;
		}

		$this->excel->getActiveSheet()->getColumnDimensionByColumn("A")->setWidth('2');
		foreach(range('B','Z') as $columnID) {
			$this->excel->getActiveSheet()->getColumnDimension($columnID)->setWidth('20');
		}
		$this->excel->getActiveSheet()->calculateColumnWidths();

		$this->excel->setActiveSheetIndex(0);

		$times = time();
		$date = date("ynjGis", $times);

		$filename='Debate_list_'.$date.'.xlsx';
		header("Content-Encoding: utf-8");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}

	function user_download($type){
		$user_list = $this->Admin_model->select_user_list(0, 50, $type);

		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('report_user_list');

		$this->excel->getActiveSheet()->mergeCells('B2:E2');
		$this->excel->getActiveSheet()->getStyle('B2:E3')->getFont()->setSize(16)->setBold(true);
		$this->excel->getActiveSheet()->setCellValue('B2', "User List" );


		$this->excel->getActiveSheet()->setCellValue('B3', "User id" );
		$this->excel->getActiveSheet()->setCellValue('C3', 'Email');
		$this->excel->getActiveSheet()->setCellValue('D3', 'Auth_code');
		$this->excel->getActiveSheet()->setCellValue('E3', 'Reg_date');
		$index = 4;
		$status = "";
		foreach($user_list as $row){
			$this->excel->getActiveSheet()->setCellValue('B'.$index, $row->id);
			$this->excel->getActiveSheet()->setCellValue('C'.$index, $row->email);
			$this->excel->getActiveSheet()->setCellValue('D'.$index, $row->auth_code);
			$this->excel->getActiveSheet()->setCellValue('E'.$index, $row->reg_date);
			$index ++;
		}

		$this->excel->getActiveSheet()->getColumnDimensionByColumn("A")->setWidth('2');
		foreach(range('B','Z') as $columnID) {
			$this->excel->getActiveSheet()->getColumnDimension($columnID)->setWidth('20');
		}
		$this->excel->getActiveSheet()->calculateColumnWidths();

		$this->excel->setActiveSheetIndex(0);

		$times = time();
		$date = date("ynjGis", $times);

		$filename='User_list_'.$date.'.xlsx';
		header("Content-Encoding: utf-8");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}

	/**
		게시판 목록
	**/
	function board_list(){
		$config['base_url'] = '/admin/board/list/page';
    $config['total_rows'] = $this->Admin_model->get_board_content_count();
    $config['per_page'] = 50;
    $config['uri_segment'] = 5;
    $config['num_links'] = 4;

		$config['prev_tag_open'] = "<li class='waves-effect'><i class='material-icons'>";
		$config['prev_tag_close'] = "</i></li>";
		$config['next_tag_open'] = "<li class='waves-effect'><i class='material-icons'>";
		$config['next_tag_close'] = "</i></li>";
		$config['num_tag_open'] = "<li class='waves-effect'>";
		$config['num_tag_close'] = "</li>";
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['cur_tag_open'] = "<li class='active'><a href='#'>";
		$config['cur_tag_close'] = "</a></li>";


    $this->pagination->initialize($config);
    $data['pagination'] = $this -> pagination -> create_links();


    $page = $this -> uri -> segment(5,1);

    if($page > 1){
      $start = (($page / $config['per_page'])) * $config['per_page'];
    } else {
      $start = ($page - 1) * $config['per_page'];
    }

    $limit = $config['per_page'];

		$board_count_per_month = $this->Admin_model->get_board_count_per_month();
		$data["board_count_per_month"] = $board_count_per_month;



    $board_list = $this->Admin_model->select_board_list($start, $limit);
    $data["board_list"] = $board_list;
		$this->layout->setLayout("layout/admin_layout_view");
    $this->layout->view('/admin/board_list_view', $data);
	}

	function debate_list(){
		$config['base_url'] = '/admin/debate/list/page';
    $config['total_rows'] = $this->Admin_model->get_debate_content_count();
    $config['per_page'] = 50;
    $config['uri_segment'] = 5;
    $config['num_links'] = 4;
		$config['prev_tag_open'] = "<li class='waves-effect'><i class='material-icons'>";
		$config['prev_tag_close'] = "</i></li>";
		$config['next_tag_open'] = "<li class='waves-effect'><i class='material-icons'>";
		$config['next_tag_close'] = "</i></li>";
		$config['num_tag_open'] = "<li class='waves-effect'>";
		$config['num_tag_close'] = "</li>";
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['cur_tag_open'] = "<li class='active'><a href='#'>";
		$config['cur_tag_close'] = "</a></li>";

    $this->pagination->initialize($config);
    $data['pagination'] = $this -> pagination -> create_links();



    $page = $this -> uri -> segment(5,1);

    if($page > 1){
      $start = (($page / $config['per_page'])) * $config['per_page'];
    } else {
      $start = ($page - 1) * $config['per_page'];
    }

    $limit = $config['per_page'];



				$debate_count_per_month = $this->Admin_model->get_debate_count_per_month();
				$data["debate_count_per_month"] = $debate_count_per_month;

    $debate_list = $this->Admin_model->select_debate_list($start, $limit);
    $data["debate_list"] = $debate_list;


		$this->layout->setLayout("layout/admin_layout_view");
    $this->layout->view('/admin/debate_list_view', $data);
	}

	function board_info($id){
		$board_content = $this->Admin_model->select_board_info($id);
		$data["board_content"] = $board_content;

		$reply_list = $this->Admin_model->select_board_reply_list($id);
		$data["reply_list"] = $reply_list;

		$this->layout->setLayout("layout/admin_layout_view");
		$this->layout->view('/admin/board_info_view', $data);
	}

	function user_info($id){
		$user_info = $this->Admin_model->select_user_info($id);
		$data["user_info"] = $user_info;
		$this->layout->setLayout("layout/admin_layout_view");
		$this->layout->view('/admin/user_info_view', $data);
	}

	function debate_info($id){
		$debate_content = $this->Admin_model->select_debate_info($id);
		$data["debate_content"] = $debate_content;

		$reply_list = $this->Admin_model->select_debate_reply_list($id);
		$data["reply_list"] = $reply_list;

		$bm_status = $this->Admin_model->get_bm_status($id, 100);
		$data["bm_status"] = $bm_status;


		// if(isset($bm_status)){
		// 	if($bm_status -> chg_st == 1){
		// 		return "exist_1";
		// 	}else if($bm_status -> chg_st == 0){
		// 		return "exist_0";
		// 	}
		// }else{
		// 	return "0";
		// 	// 이 경우 insert 해주면 됨
		// }

		$this->layout->setLayout("layout/admin_layout_view");
		$this->layout->view('/admin/debate_info_view', $data);
	}

	function debate_write(){
		$this->layout->setLayout("layout/admin_layout_view");
		$this->layout->view('/admin/debate_write_view');
	}

	function board_write(){
		$this->layout->setLayout("layout/admin_layout_view");
    $this->layout->view('/admin/board_write_view');
	}
	function board_add($code){

		    $this->form_validation->set_rules('board_title', 'Title', 'trim|required');
		    $this->form_validation->set_rules('board_content', 'Content', 'trim|required|max_length[100]');
		    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');




				if ($this->form_validation->run() == FALSE)
				{
					$this->layout->setLayout("layout/admin_layout_view");
					$this->layout->view('/admin/board/write');
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
					$this->Admin_model->history_log($code, 0, $_POST["user_id"]);

		      $data["check"] = "success";
		      echo json_encode($data);
		      redirect("/admin/board/list");
				}
	}

	function debate_add($code){

		    $this->form_validation->set_rules('debate_title', 'Title', 'trim|required');
		    $this->form_validation->set_rules('debate_content', 'Content', 'trim|required|max_length[100]');
		    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');



				if ($this->form_validation->run() == FALSE)
				{
					$this->layout->setLayout("layout/admin_layout_view");
					$this->layout->view('/admin/debate/write');
				}
				else
				{

		      $param = array(
		        'title' => $_POST["debate_title"],
		        'content' => $_POST["debate_content"],
		        'reg_id' => $_POST["user_id"],
		        'reg_date' => date("Y-m-d H:i:s", time()),
		        'file_id' => ''
		      );

		      $this->Admin_model->insert_debate_content($param);
					$this->Admin_model->history_log($code, 0, $_POST["user_id"]);

		      $data["check"] = "success";
		      // echo json_encode($data);
		      redirect("/admin/debate/list");
				}
	}

	public function debate_reply($id, $code){
		$this->form_validation->set_rules('reply_content', 'Content', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('user_id', 'user_id', 'trim|required');


		$param = array(
			"debate_id" => $id,
			"content" => $this->input->post("reply_content"),
			"reg_id" => $this->input->post("user_id"),
			"reg_date" => date("T-m-d H:i:s", time())
		);

		$this->Admin_model->insert_debate_reply($param);
		$this->Admin_model->history_log($code, $id, $_POST["user_id"]);

		$data["check"] = "success";
		// echo json_encode($data);
		redirect("/admin/debate/info?bid=$id");
	}

	public function board_reply($id, $code){
		$this->form_validation->set_rules('reply_content', 'Content', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('user_id', 'user_id', 'trim|required');


		$param = array(
			"board_id" => $id,
			"content" => $this->input->post("reply_content"),
			"reg_id" => $this->input->post("user_id"),
			"reg_date" => date("T-m-d H:i:s", time())
		);

		$this->Admin_model->insert_board_reply($param);
		$this->Admin_model->history_log($code, $id, $_POST["user_id"]);

		$data["check"] = "success";
		// echo json_encode($data);
		redirect("/admin/board/info?bid=$id");
	}

	public function board_edit($id){
		$board_content = $this->Admin_model->select_board_info($id);
		$data["board_content"] = $board_content;
		$this->layout->setLayout("layout/admin_layout_view");
		$this->layout->view('/admin/board_edit_view', $data);
	}

	public function debate_edit($id){
		$debate_content = $this->Admin_model->select_debate_info($id);
		$data["debate_content"] = $debate_content;
		$this->layout->setLayout("layout/admin_layout_view");
		$this->layout->view('/admin/debate_edit_view', $data);
	}

/**
			유저 Password 초기화 함수
			sha512 알고리즘 사용
			개인정보 변경 후 e-mail로 고지(Mailer 이용)
**/
	public function user_reset($id, $code){
		$str = "pass1234!@#$";
		$hash_str = hash("sha512", $str);

		$param = array(
			"auth_code" => $hash_str,
			"upt_id" => $id,
			"upt_date" => date("Y-m-d H:i:s", time())
		);

		// $name = "Name = mail test", $email="dvmoomoodv@gmail.com", $title="Title - mail test", $content="Content - mail test"

		$result = send($id, "jingil5068@gmail.com", "[Notice] Changed Account Info", "Your password was changed. Password : " . $hash_str);

		$this->Admin_model->reset_user_password($id, $param);
		$this->Admin_model->history_log($code, $id, $id);

		$data["check"] = "reset password success";

		redirect('/admin/user/list');
	}

	public function user_edit($id){
		$this->layout->setLayout("layout/admin_layout_view");
		$user_info = $this->Admin_model->select_user_info($id);
		$data["user_info"] = $user_info;

		$this->layout->view('/admin/user_edit_view', $data);
	}



	public function board_update($id, $param, $code, $upt_id){
		$this->Admin_model->update_board_content($id, $param);

		$this->Admin_model->history_log($code, $id, $upt_id);

		$data["check"] = "board content update success";
		//echo json_encode($data);

		redirect('/admin/board/list');
	}

	public function debate_update($id, $param, $code, $upt_id){
		$this->Admin_model->update_debate_content($id, $param);

		$this->Admin_model->history_log($code, $id, $upt_id);

		$data["check"] = "debate content update success";
		//echo json_encode($data);

		redirect('/admin/debate/list');
	}

/**
		유저 정보(권한) 변경하는 함수
		변경 후 Email로 고지
**/
	public function user_update($id, $param, $code){
		$this->Admin_model->update_user_info($id, $param);
		$this->Admin_model->history_log($code, $id, 0);

		$result = send($id, "jingil5068@gmail.com", "[Notice] Changed Account Info", "Updated your permissions. Please check it!");
		$data["check"] = "user info update success";
		//echo json_encode($data);

		redirect('/admin/user/list');
	}


	public function board_remove($id, $code){
		$param = array(
			'del_st' => '1',
			'del_id' =>'100',
			'del_date' => date("Y-m-d H:i:s", time())
		);

		$this->Admin_model->update_board_content($id, $param);
		$this->Admin_model->history_log($code, $id, 100);

		redirect("admin/board/list");
	}

	public function debate_remove($id, $code){
		$param = array(
			'del_st' => '1',
			'del_id' =>'100',
			'del_date' => date("Y-m-d H:i:s", time())
		);

		$this->Admin_model->update_debate_content($id, $param);
		$this->Admin_model->history_log($code, $id, 100);

		redirect("admin/debate/list");
	}
}
