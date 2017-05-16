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
		$query = $this->db->get('tb_board');
		$result = $query->result();
		return $result;
	}

	function select_login_user_info(){
		log_message("info", "Web-Model : Test_model_select_login_user_info");
		$this->db->select('id, email');
		$email = "jingil5068@gmail.com1";
		$query = $this->db->get_where('tb_user', array('email'=>$email));
		$result = $query->row();

		return $result;
	}

	function select_board_reply_list(){
		log_message("info", "Web-Model : Test_model_select_board_reply_list");
		$this->db->select('id, content');
		$reg_id=-1;
		$query = $this->db->get_where('tb_board_reply', array('reg_id'=>$reg_id));
		$result = $query->result();

		return $result;
	}

	function select_super_admin_list(){
		log_message("info", "Web-Model : Test_model_select_super_admin_list");
		$this->db->select('id, role, name, phone, expiry_date');
		$role = "super";
		$query = $this->db->get_where('tb_admin', array('role'=>$role));
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
		$query = $this->db->get('tb_law_model');
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
		$query = $this->db->get('tb_debate_reply');
		$result = $query->result();

		return $result;
	}


	function select_message_list(){
		log_message("info", "Web-Model : Test_model_select_message_list");
		$this->db->select('msg_st, sent_user_id, sent_date, recv_user_id, reg_date, content');
		$recv_user_id = 1;
		$query = $this->db->get_where('tb_msg', array('recv_user_id'=>$recv_user_id));
		$result = $query->result();

		return $result;
	}

}
