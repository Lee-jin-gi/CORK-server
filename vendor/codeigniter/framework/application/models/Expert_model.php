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
class Expert_model extends CI_Model {
	function __construct(){
		log_message("info", "Web-Model : Expert_model Constructor");
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

  function get_book_mark_count($user_id){
    // $this->load->model('Welcome_model');

    $this->db->from('tb_bookmark');
    $this->db->where(array('chg_st'=> 1, 'user_id'=>$user_id));
    $count = $this->db->count_all_results();

    return $count;
  }

  function select_book_mark_list($offset = '', $limit = '', $user_id){

		$this->db->select("b.id, b.debate_id, d.title, b.chg_date", false);
		$this->db->from('tb_bookmark b');
    $this->db->join('tb_debate d', 'b.debate_id = d.id');
    $this->db->where(array('b.chg_st'=>1 ,'b.user_id'=> $user_id));
		$this->db->order_by("b.id", "desc");


    $limit_query = '';

    if ($limit != '' OR $offset != '') {
        $this->db->limit($limit, $offset);
    }else{
      $this->db->limit(20);
    }



		$result = $this->db->get();

    return $result->result();

  }

}
