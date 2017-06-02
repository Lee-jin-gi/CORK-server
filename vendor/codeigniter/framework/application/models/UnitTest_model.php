<?php
/** *********************************************************************
 * Packages : models
 * File : UnitTest_model.php
 * Comment : UnitTest Model
 * Date : 2017.06.01
 * Memo
 * =>
 *
 ********************************************************************** */
class UnitTest_model extends CI_Model {
	function __construct(){
		log_message("info", "Web-Model : UnitTest_model Constructor");
		parent::__construct();
	}

  function debate_list_test($offset = '', $limit = ''){
    log_message("info", "Web-Model : UnitTest_select_debate_list");
    $this->db->select("id, title, content, reg_id, del_st");
    $this->db->from('tb_debate');


    if ($limit != '' OR $offset != '') {
        $this->db->limit($limit, $offset);
    }else{
      $this->db->limit(20);
    }

    $result = $this->db->get();

    return $result->result();
  }

  function debate_reply_list_test($offset = '', $limit = ''){
    log_message("info", "Web-Model : UnitTest_select_debate_reply_list");
    $this->db->select("id, debate_id, content, reg_id, del_st");
    $this->db->from('tb_debate_reply');


    if ($limit != '' OR $offset != '') {
        $this->db->limit($limit, $offset);
    }else{
      $this->db->limit(20);
    }

    $result = $this->db->get();

    return $result->result();
  }

  function debate_back_list_test($offset = '', $limit = ''){
    log_message("info", "Web-Model : UnitTest_select_debate_back_list");
    $this->db->select("id, debate_id, seq, title, content");
    $this->db->from('tb_debate_back');


    if ($limit != '' OR $offset != '') {
        $this->db->limit($limit, $offset);
    }else{
      $this->db->limit(20);
    }

    $result = $this->db->get();

    return $result->result();
  }

	function board_list_test($offset = '', $limit = ''){
    log_message("info", "Web-Model : UnitTest_select_board_list");
    $this->db->select("id, title, content, reg_id, del_st");
    $this->db->from('tb_board');


    if ($limit != '' OR $offset != '') {
        $this->db->limit($limit, $offset);
    }else{
      $this->db->limit(20);
    }

    $result = $this->db->get();

    return $result->result();
  }

  function board_reply_list_test($offset = '', $limit = ''){
    log_message("info", "Web-Model : UnitTest_select_board_reply_list");
    $this->db->select("id,  board_id, content, reg_id, del_st");
    $this->db->from('tb_board_reply');


    if ($limit != '' OR $offset != '') {
        $this->db->limit($limit, $offset);
    }else{
      $this->db->limit(20);
    }

    $result = $this->db->get();

    return $result->result();
  }

	function law_list_test($offset = '', $limit = ''){
		log_message("info", "Web-Model : UnitTest_select_law_list");
    $this->db->select("id, d1, d2, d3, d4, d5, d6, d7, d8, content, reg_id");
    $this->db->from('tb_law');


    if ($limit != '' OR $offset != '') {
        $this->db->limit($limit, $offset);
    }else{
      $this->db->limit(20);
    }

    $result = $this->db->get();

    return $result->result();
	}

	function law_model_list_test($offset = '', $limit = ''){
    log_message("info", "Web-Model : UnitTest_select_law_model_list");
    $this->db->select("id, title, content, reg_id, del_st");
    $this->db->from('tb_law_model');


    if ($limit != '' OR $offset != '') {
        $this->db->limit($limit, $offset);
    }else{
      $this->db->limit(20);
    }

    $result = $this->db->get();

    return $result->result();
  }

	function log_list_test($offset = '', $limit = ''){
    log_message("info", "Web-Model : UnitTest_select_log_list");
    $this->db->select("id, code, content_id, reg_id");
    $this->db->from('tb_log');


    if ($limit != '' OR $offset != '') {
        $this->db->limit($limit, $offset);
    }else{
      $this->db->limit(20);
    }

    $result = $this->db->get();

    return $result->result();
  }

	function user_list_test($offset = '', $limit = ''){
    log_message("info", "Web-Model : UnitTest_select_user_list");
    $this->db->select("id, email, auth_code");
    $this->db->from('tb_user');


    if ($limit != '' OR $offset != '') {
        $this->db->limit($limit, $offset);
    }else{
      $this->db->limit(20);
    }

    $result = $this->db->get();

    return $result->result();
  }
	function user_info_list_test($offset = '', $limit = ''){
    log_message("info", "Web-Model : UnitTest_select_user_info_list");
    $this->db->select("id, user_id, user_code, acc_st");
    $this->db->from('tb_user_info');


    if ($limit != '' OR $offset != '') {
        $this->db->limit($limit, $offset);
    }else{
      $this->db->limit(20);
    }

    $result = $this->db->get();

    return $result->result();
  }

}
