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
}
