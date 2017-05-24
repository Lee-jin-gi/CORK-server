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
}
