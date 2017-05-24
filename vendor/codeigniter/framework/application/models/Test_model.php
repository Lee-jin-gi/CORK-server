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
class Test_model extends CI_Model {
	function __construct(){
		log_message("info", "Web-Model : Test_model Constructor");
		parent::__construct();
	}

	function select_test(){
		log_message("info", "Web-Model : Test_model select_test");
		$sql = "
      SELECT 1 FROM dual
    ";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}

	function select_board_list($offset = '', $limit = ''){
		log_message("info", "Web-Model : Test_model_select_board_test");
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



	function select_login_user_info(){
		log_message("info", "Web-Model : Test_model_select_login_user_info");
		$this->db->select('id, email');
		$this->db->limit(1);

		$email = "jingil5068@gmail.com1";
		$query = $this->db->get_where('tb_user', array('email'=>$email));
		$result = $query->row();

		return $result;
	}

	function select_board_reply_list(){
		log_message("info", "Web-Model : Test_model_select_board_reply_list");
		$this->db->select('id, content');
		$this->db->limit(5);

		$reg_id=-1;
		$query = $this->db->get_where('tb_board_reply', array('reg_id'=>$reg_id));
		$result = $query->result();

		return $result;
	}


	function select_law_info(){
		log_message("info", "Web-Model : Test_model_select_law_info");
		$this->db->select('content');
		$query = $this->db->get_where('tb_law', array('id'=>1));
		$result = $query->row();

		return $result;
	}

	function select_law_model_list(){
		log_message("info", "Web-Model : Test_model_select_law_model_list");
		$this->db->select('title, content');
		$this->db->order_by("id", "desc");
		$query = $this->db->get('tb_law_model',5);
		$result = $query->result();

		return $result;
	}

	function select_debate_info(){
		log_message("info", "Web-Model : Test_model_select_debate_info");
		$this->db->select('title, content, reg_id, reg_date');
		$id = 1;
		$query = $this->db->get_where('tb_debate', array('id'=>$id));
		$result = $query->row();

		return $result;
	}

	function select_board_info($board_id){
		log_message("info", "Web-Model : Test_model_select_board_info");
		$this->db->select('id, title, content, reg_id, reg_date');
		$query = $this->db->get_where('tb_board', array('id'=>$board_id));
		$result = $query->row();

		return $result;
	}

	function select_debate_info_by_id($debate_id){
		log_message("info", "Web-Model : Test_model_select_debate_info");
		$this->db->select('id, title, content');
		$query = $this->db->get_where('tb_debate', array('id'=>$debate_id));
		$result = $query->row();
		return $result;
	}

	function select_debate_reply_list(){
		log_message("info", "Web-Model : Test_model_select_debate_reply_list");
		$this->db->select('id, content, reg_id, reg_date');
		$this->db->limit(5);
		$this->db->order_by("id", "desc");
		$query = $this->db->get('tb_debate_reply');
		$result = $query->result();

		return $result;
	}

	function select_debate_back_cnt($debate_id){
		log_message("info", "Web-Model : Test_model_update_debate_back_info");

		$this->db->from('tb_debate_back');
		$this->db->where('debate_id', $debate_id);
		$count = $this->db->count_all_results();

		return $count;

	}

	function insert_law($param){

		log_message("info", "Web-Model : Test_model_insert_law_test");
		$this->db->insert('tb_law', $param);
	}

	function insert_law_model($param){

		log_message("info", "Web-Model : Test_model_insert_law_model_test");
		$this->db->insert('tb_law_model', $param);
	}

	function insert_debate_content($param){
		log_message("info", "Web-Model : Test_model_insert_debate_content");
		$this->db->insert('tb_debate', $param);
	}

	function insert_debate_reply($param){
		log_message("info", "Web-Model : Test_model_insert_debate_reply");
		$this->db->insert('tb_debate_reply', $param);
	}

	function insert_debate_backup($param){
		log_message("info", "Web-Model : Test_model_insert_debate_backup");
		$this->db->insert('tb_debate_back', $param);
	}

	function insert_board_content($param){
		log_message("info", "Web-Model : Test_model_insert_board_content");
		$this->db->insert('tb_board', $param);
	}

	function delete_debate_content($debate_id, $param){
		log_message("info", "Web-Model : Test_model_delete_debate_content");
		$this->db->where('id', $debate_id);
		$this->db->update('tb_debate', $param);
	}

	function delete_debate_reply($reply_id, $param){
		log_message("info", "Web-Model : Test_model_delete_debate_reply");
		$this->db->where('id', $reply_id);
		$this->db->update('tb_debate_reply', $param);
	}

	function update_debate_reply($reply_id, $param){
		log_message("info", "Web-Model : Test_model_update_debate_reply");
		$this->db->where('id', $reply_id);
		$this->db->update('tb_debate_reply', $param);
	}

	function update_debate_content($debate_id, $param){
		log_message("info", "Web-Model : Test_model_update_debate_content");
		$this->db->where('id', $debate_id);
		$this->db->update('tb_debate', $param);
	}

	function update_board_content($board_id, $param){
		log_message("info", "Web-Model : Test_model_update_board_content");
		$this->db->where('id', $board_id);
		$this->db->update('tb_board', $param);
	}



	function get_board_content_count(){
		log_message("info", "Web-Model : Test_model_get_board_content_count_info");

		$this->db->from('tb_board');
		$this->db->where('del_st', !1);
		$count = $this->db->count_all_results();

		return $count;
	}



	// function select_message_list(){
	// 	log_message("info", "Web-Model : Test_model_select_message_list");
	// 	$this->db->select('msg_st, sent_user_id, sent_date, recv_user_id, reg_date, content');
	// 	$this->db->order_by("id", "desc");
	// 	$this->db->limit(0,5);
	// 	$recv_user_id = 1;
	// 	$query = $this->db->get_where('tb_msg', array('recv_user_id'=>$recv_user_id));
	// 	$result = $query->result();
	//
	// 	return $result;
	// }


		// function select_super_admin_list(){
		// 	log_message("info", "Web-Model : Test_model_select_super_admin_list");
		// 	$this->db->select('id, role, name, phone, expiry_date');
		// 	$this->db->order_by("id", "desc");
		// 	$this->db->limit(0,5);
		// 	$role = "super";
		// 	$query = $this->db->get_where('tb_admin', array('role'=>$role));
		// 	$result = $query->result();
		//
		// 	return $result;
		// }
}
