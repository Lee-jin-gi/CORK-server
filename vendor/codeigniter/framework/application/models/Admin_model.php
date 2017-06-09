<?php
/** *********************************************************************
 * Packages : models
 * File :
 * Comment :
 * Date : 20151209
 * Memo
 * =>
 *
 ********************************************************************** */
class Admin_model extends CI_Model {
	function __construct(){
		log_message("info", "Web-Model : Admin_model Constructor");
		parent::__construct();
	}

	// function select_test(){
	// 	log_message("info", "Web-Model : Welcome_model select_test");
	// 	$sql = "
  //     SELECT * FROM tb_board order by id desc limit 0,5
  //   ";
	// 	$query = $this->db->query($sql);
	// 	$result = $query->result();
	// 	return $result;
	// }

/**
		토론 게시판 월별 통계값 가져오는 쿼리
		Pivot
**/
	function get_debate_count_per_month(){
		$sql = "
		select
				(select count(id) from tb_debate where DATE_FORMAT(reg_date, '%Y-%m') = '2017-01') as 'm1',
				(select count(id) from tb_debate where DATE_FORMAT(reg_date, '%Y-%m') = '2017-02') as 'm2',
				(select count(id) from tb_debate where DATE_FORMAT(reg_date, '%Y-%m') = '2017-03') as 'm3',
				(select count(id) from tb_debate where DATE_FORMAT(reg_date, '%Y-%m') = '2017-04') as 'm4',
				(select count(id) from tb_debate where DATE_FORMAT(reg_date, '%Y-%m') = '2017-05') as 'm5',
				(select count(id) from tb_debate where DATE_FORMAT(reg_date, '%Y-%m') = '2017-06') as 'm6',
				(select count(id) from tb_debate where DATE_FORMAT(reg_date, '%Y-%m') = '2017-07') as 'm7',
				(select count(id) from tb_debate where DATE_FORMAT(reg_date, '%Y-%m') = '2017-08') as 'm8',
				(select count(id) from tb_debate where DATE_FORMAT(reg_date, '%Y-%m') = '2017-09') as 'm9',
				(select count(id) from tb_debate where DATE_FORMAT(reg_date, '%Y-%m') = '2017-10') as 'm10',
				(select count(id) from tb_debate where DATE_FORMAT(reg_date, '%Y-%m') = '2017-11') as 'm11',
				(select count(id) from tb_debate where DATE_FORMAT(reg_date, '%Y-%m') = '2017-12') as 'm12'
				from dual;
		";
		$query = $this->db->query($sql);
		$result = $query->row();


		return $result;
	}
	function get_board_count_per_month(){

		$this->db->select("a.month, ifnull(b.count, 0) count");
		$this->db->from("(
				select '2017-01' as month from dual
				union all
				select '2017-02' from dual
				union all
				select '2017-03' from dual
				union all
				select '2017-04' from dual
				union all
				select '2017-05' from dual
				union all
				select '2017-06' from dual
				union all
				select '2017-07' from dual
				union all
				select '2017-08' from dual
				union all
				select '2017-09' from dual
				union all
				select '2017-10' from dual
				union all
				select '2017-11' from dual
				union all
				select '2017-12' from dual
				) as a"
		);
		$this->db->join("(
				SELECT DATE_FORMAT(reg_date,'%Y-%m') month, COUNT(*) count FROM tb_board GROUP BY month having month > '2017-00' order by null)	as b", "a.month = b.month", "left outer");
		$this->db->group_by("a.month");

		$result = $this->db->get();



		return $result->result();
	}

	function get_user_count_per_month(){

		$this->db->select("a.month, ifnull(b.count, 0) count");
		$this->db->from("(
				select '2017-01' as month from dual
				union all
				select '2017-02' from dual
				union all
				select '2017-03' from dual
				union all
				select '2017-04' from dual
				union all
				select '2017-05' from dual
				union all
				select '2017-06' from dual
				union all
				select '2017-07' from dual
				union all
				select '2017-08' from dual
				union all
				select '2017-09' from dual
				union all
				select '2017-10' from dual
				union all
				select '2017-11' from dual
				union all
				select '2017-12' from dual
				) as a"
		);
		$this->db->join("(
				SELECT DATE_FORMAT(upt_date,'%Y-%m') month, COUNT(id) count FROM tb_user GROUP BY month having month > '2017-00' order by null)	as b", "a.month = b.month", "left outer");
		$this->db->group_by("a.month");

		$result = $this->db->get();



		return $result->result();
	}

  function get_board_content_count(){

    $this->db->from('tb_board');
    $this->db->where('del_st', !1);
    $count = $this->db->count_all_results();

    return $count;
  }

	function get_debate_content_count(){
    log_message("info", "Web-Model : Test_model_get_debate_content_count_info");

    $this->db->from('tb_debate');
    $this->db->where('del_st', !1);
    $count = $this->db->count_all_results();


    return $count;
  }

	function get_user_count($type){
    log_message("info", "Web-Model : Test_model_get_all_user_count_info");

    $this->db->from('tb_user');
		if($type == 'sns'){
			$this->db->like('auth_code', $type);
		}else if($type == 'email'){
			$this->db->not_like('auth_code', 'sns');
		}
    $count = $this->db->count_all_results();

    return $count;
  }

  function select_board_list($offset = '', $limit = ''){

		$this->db->select("b.id, b.title, (select count(id) from tb_board_reply br where b.id=br.board_id) reply_cnt, b.reg_id, b.reg_date", false);
		$this->db->from('tb_board b');
		$this->db->order_by("b.id", "desc");
		$this->db->where('del_st', !1);

    $limit_query = '';

    if ($limit != '' OR $offset != '') {
        // 페이징이 있을 경우 처리
        // $limit_query = ' LIMIT ' . $offset . ', ' . $limit;
        $this->db->limit($limit, $offset);
    }else{
      $this->db->limit(20);
    }



		$result = $this->db->get();

    return $result->result();

  }

	function select_debate_list($offset = '', $limit = ''){

		$this->db->select("d.id, d.title, (select count(*) from tb_debate_reply dr where d.id=dr.debate_id) reply_cnt, d.reg_id, d.reg_date", false);
		$this->db->from('tb_debate d');
		$this->db->order_by("d.id", "desc");
		$this->db->where('del_st', !1);
    $limit_query = '';

    if ($limit != '' OR $offset != '') {
        $this->db->limit($limit, $offset);
    }else{
      $this->db->limit(20);
    }

    $result = $this->db->get();

    return $result->result();

  }

	function select_user_list($offset = '', $limit= '', $type){
	 log_message("info", "Web-Model : Test_model_select_user_list");

	 $this->db->select('id, email, auth_code, reg_date');
	 $this->db->order_by("id", "desc");


	 $limit_query = '';

	 if ($limit != '' OR $offset != '') {
	 		$this->db->limit($limit, $offset);
	 }else{
	 	$this->db->limit(20);
	 }

	 // 타입이 sns일 꼉우 auth_code가 sns_xxxxxxxxxxxxx
	 // Admin - user_reset($id, $code) 함수에서 초기화 하면 sns_xxxxxx에서 sns_ 사라짐.
	 if($type == 'sns'){
		 $this->db->like('auth_code', $type);
	 }else if($type == 'email'){
		 $this->db->not_like('auth_code', 'sns');
	 }
	 $query = $this->db->get('tb_user');
	 $result = $query->result();

	 return $result;
	}

	function select_board_reply_list($board_id){
		$this->db->select('id, content, reg_id, reg_date');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get_where('tb_board_reply', array("board_id" => $board_id));

		$result = $query->result();

		return $result;
	}

	function select_debate_reply_list($debate_id){
		$this->db->select('id, content, reg_id, reg_date');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get_where('tb_debate_reply', array("debate_id" => $debate_id));

		$result = $query->result();

		return $result;
	}


  function insert_board_content($param){
		log_message("info", "Web-Model : Test_model_insert_board_content");
		$this->db->insert('tb_board', $param);
	}

	function insert_debate_content($param){
		log_message("info", "Web-Model : Test_model_insert_debate_content");
		$this->db->insert('tb_debate', $param);
	}

	function insert_debate_reply($param){
		log_message("info", "Web-Model : Test_model_insert_debate_reply");
		$this->db->insert('tb_debate_reply', $param);
	}
	function insert_board_reply($param){
		log_message("info", "Web-Model : Test_model_insert_board_reply");
		$this->db->insert('tb_board_reply', $param);
	}
	function insert_sns_info($param){
		log_message("info", "Web-Model : Admin_model_insert_sns_info");
		$this->db->insert('tb_user_sns', $param);
	}

	// get_bookmark_status
	function get_bm_status($debate_id, $user_id){
		$this->db->select('chg_st');
    $query = $this->db->get_where('tb_bookmark', array('debate_id'=>$debate_id, 'user_id'=>$user_id));


    $result = $query->row();

    return $result;
	}

/**
	SNS 등록 이력있는지 확인하는 쿼리
**/
	function get_sns_status($app_id, $sns){
		$this->db->select('id, sns_code, sns_token, tb_user_id, reg_date');
		$query = $this->db->get_where('tb_user_sns', array('sns_code'=>$sns, 'sns_token'=>$app_id));

		$result = $query->row();
		return $result;
	}

	function insert_book_mark($param){
		log_message("info", "Web-Model : Admin_model_insert_book_mark");
		$this->db->insert('tb_bookmark', $param);
	}

	function update_book_mark($param, $debate_id, $user_id){
		log_message("info", "Web-Model : Admin_model_update_book_mark");
		$this->db->update('tb_bookmark', $param, array('debate_id'=>$debate_id, 'user_id'=>$user_id));
	}


	function select_board_info($board_id){
		log_message("info", "Web-Model : Test_model_select_board_info");
		$this->db->select('id, title, content, reg_id, reg_date');
		$query = $this->db->get_where('tb_board', array('id'=>$board_id));
		$result = $query->row();
		return $result;
	}

	function select_debate_info($debate_id){
		log_message("info", "Web-Model : Test_model_select_debate_info");
		$this->db->select('id, title, content, reg_id, reg_date');
		$query = $this->db->get_where('tb_debate', array('id'=>$debate_id));
		$result = $query->row();
		return $result;
	}

	function update_board_content($board_id, $param){
		log_message("info", "Web-Model : Test_model_update_board_content");
		$this->db->where('id', $board_id);
		$this->db->update('tb_board', $param);
	}

	function update_debate_content($debate_id, $param){
		log_message("info", "Web-Model : Test_model_update_debate_content");
		$this->db->where('id', $debate_id);
		$this->db->update('tb_debate', $param);
	}

	function update_user_info($user_id, $param){
		log_message("info", "Web-Model : Test_model_update_user_info");
		$this->db->where('user_id', $user_id);
		$this->db->update('tb_user_info', $param);
	}

	function select_user_info($user_id){
		log_message("info", "Web-Model : Test_model_select_board_info");
		$this->db->select('u.id as `id`, u.email, u.reg_date, i.user_code, i.acc_st, i.expire_date', false);
		$this->db->from('tb_user as u');
		$this->db->join('tb_user_info as i', 'u.id = i.user_id');
		$this->db->where('i.user_id', $user_id);

		// $sql = $this->db->select('u.id as `id`, u.email, u.reg_date, i.user_code, i.acc_st, i.expire_date', false)
		// 					->from('tb_user as u')
		// ->join('tb_user_info as i', 'u.id = i.user_id')
		// ->where('i.user_id', $user_id)->get_compiled_select();
		// $query = $this->db->query($sql);
		$result = $this->db->get();
		// echo $this->db->last_query();
		// exit;

		return $result->row();
		// return $query->row();
	}

	function reset_user_password($user_id, $param){
	log_message("info", "Web-Model : Test_model_reset_user_password");
		$this->db->where('id', $user_id);
		$this->db->update('tb_user', $param);
	}

/**
	Issue Code별 로그 남기는 쿼리
**/
	function history_log($code, $id, $reg_id){
		$param = array(
			"code" => $code,
			"content_id" => $id,
			"reg_id" => $reg_id,
			"reg_date" => date("Y-m-d H:i:s", time())
		);

		log_message("info", "Web-Model : Test_model_history_log");
		$this->db->insert('tb_log', $param);
	}
}
