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

	function select_board_list(){
		log_message("info", "Web-Model : Test_model_select_board_test");
		$this->db->order_by("id", "desc");
		$this->db->limit(5);
		$query = $this->db->get('tb_board');
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

	function select_debate_reply_list(){
		log_message("info", "Web-Model : Test_model_select_debate_reply_list");
		$this->db->select('id, content, reg_id, reg_date');
		$this->db->limit(5);
		$this->db->order_by("id", "desc");
		$query = $this->db->get('tb_debate_reply');
		$result = $query->result();

		return $result;
	}

	function insert_law($param){
        
		log_message("info", "Web-Model : Test_model_insert_law_test");
		$this->db->insert('tb_law', $param);
	}

	function insert_law_model($param){

		log_message("info", "Web-Model : Test_model_insert_law_model_test");
		$this->db->insert('tb_law_model', $param);
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
