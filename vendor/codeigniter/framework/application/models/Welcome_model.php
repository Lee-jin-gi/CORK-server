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
class Welcome_model extends CI_Model {
	function __construct(){
		log_message("info", "Web-Model : Welcome_model Constructor");
		parent::__construct();
	}

	function select_test(){
		log_message("info", "Web-Model : Welcome_model select_test");
		$sql = "
      SELECT * FROM tb_board limit 0,5
    ";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}
}
