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

  function get_board_content_count(){
    log_message("info", "Web-Model : Test_model_get_board_content_count_info");

    $this->db->from('tb_board');
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

    $this->db->order_by("id", "desc");

    $limit_query = '';

    if ($limit != '' OR $offset != '') {
        // 페이징이 있을 경우 처리
        // $limit_query = ' LIMIT ' . $offset . ', ' . $limit;
        $this->db->limit($limit, $offset);
    }else{
      $this->db->limit(20);
    }


    $query = $this->db->get_where('tb_board', array('del_st'=>!1));
    $result = $query->result();
    return $result;

  }

	function select_user_list($offset = '', $limit= '', $type){
	 log_message("info", "Web-Model : Test_model_select_user_list");

	 $this->db->select('id, email, auth_code, reg_date');
	 $this->db->order_by("id", "desc");


	 $limit_query = '';

	 if ($limit != '' OR $offset != '') {
	 		// 페이징이 있을 경우 처리
	 		// $limit_query = ' LIMIT ' . $offset . ', ' . $limit;
	 		$this->db->limit($limit, $offset);
	 }else{
	 	$this->db->limit(20);
	 }
	 if($type == 'sns'){
		 $this->db->like('auth_code', $type);
	 }else if($type == 'email'){
		 $this->db->not_like('auth_code', 'sns');
	 }
	 $query = $this->db->get('tb_user');
	 $result = $query->result();

	 return $result;
	}
  function insert_board_content($param){
		log_message("info", "Web-Model : Test_model_insert_board_content");
		$this->db->insert('tb_board', $param);
	}
	function select_board_info($board_id){
		log_message("info", "Web-Model : Test_model_select_board_info");
		$this->db->select('id, title, content, reg_id, reg_date');
		$query = $this->db->get_where('tb_board', array('id'=>$board_id));
		$result = $query->row();


		return $result;
	}

	function update_board_content($board_id, $param){
		log_message("info", "Web-Model : Test_model_update_board_content");
		$this->db->where('id', $board_id);
		$this->db->update('tb_board', $param);
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
}
