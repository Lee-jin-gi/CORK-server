<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unittest extends CI_Controller {

  function __construct() {
    parent::__construct ();
    $this->load->model('UnitTest_model');
    $this->load->library('unit_test');
	}

  function index(){

    echo "test";
  }

  function debate(){
    $offset = $this->input->get("offset");
    $limit = $this->input->get("limit");

		$debate_test_list = $this->UnitTest_model->debate_list_test($offset, $limit);


		for($i = 0 ; $i < count($debate_test_list); $i ++){

      $this->unit->use_strict(TRUE);

			$this->unit->run($debate_test_list[$i]->id, 'is_numeric', 'id_type');

      $this->unit->run($debate_test_list[$i]->title, 'is_string', 'title_type');

      $this->unit->run($debate_test_list[$i]->content, 'is_string', 'content_type');

      $this->unit->run($debate_test_list[$i]->reg_id, 'is_numeric', 'reg_id_type');

      $this->unit->run($debate_test_list[$i]->del_st, 'is_numeric', 'del_st_type');

		}
    echo $this->unit->report();
  }

  function debate_reply(){
    $offset = $this->input->get("offset");
    $limit = $this->input->get("limit");

    $debate_reply_test_list = $this->UnitTest_model->debate_reply_list_test($offset, $limit);

    for($i = 0 ; $i < count($debate_reply_test_list); $i ++){

      $this->unit->use_strict(TRUE);

			$this->unit->run($debate_reply_test_list[$i]->id, 'is_numeric', 'id_type');

      $this->unit->run($debate_reply_test_list[$i]->debate_id, 'is_numeric', 'debate_id_type');

      $this->unit->run($debate_reply_test_list[$i]->content, 'is_string', 'content_type');

      $this->unit->run($debate_reply_test_list[$i]->reg_id, 'is_numeric', 'reg_id_type');

      $this->unit->run($debate_reply_test_list[$i]->del_st, 'is_numeric', 'del_st_type');

		}
    echo $this->unit->report();
  }

  function debate_back(){
    $offset = $this->input->get("offset");
    $limit = $this->input->get("limit");

    $debate_back_test_list = $this->UnitTest_model->debate_back_list_test($offset, $limit);

    for($i = 0 ; $i < count($debate_back_test_list); $i ++){

      $this->unit->use_strict(TRUE);

			$this->unit->run($debate_back_test_list[$i]->id, 'is_numeric', 'id_type');

      $this->unit->run($debate_back_test_list[$i]->debate_id, 'is_numeric', 'debate_id_type');

      $this->unit->run($debate_back_test_list[$i]->seq, 'is_numeric', 'seq_type');

      $this->unit->run($debate_back_test_list[$i]->title, 'is_string', 'title_type');

      $this->unit->run($debate_back_test_list[$i]->content, 'is_string', 'content_type');

		}
    echo $this->unit->report();
  }

  function board(){
    $offset = $this->input->get("offset");
    $limit = $this->input->get("limit");

		$board_test_list = $this->UnitTest_model->board_list_test($offset, $limit);


		for($i = 0 ; $i < count($board_test_list); $i ++){

      $this->unit->use_strict(TRUE);

			$this->unit->run($board_test_list[$i]->id, 'is_numeric', 'id_type');

      $this->unit->run($board_test_list[$i]->title, 'is_string', 'title_type');

      $this->unit->run($board_test_list[$i]->content, 'is_string', 'content_type');

      $this->unit->run($board_test_list[$i]->reg_id, 'is_numeric', 'reg_id_type');

      $this->unit->run($board_test_list[$i]->del_st, 'is_numeric', 'del_st_type');

		}
    echo $this->unit->report();
  }

  function board_reply(){
    $offset = $this->input->get("offset");
    $limit = $this->input->get("limit");

    $board_reply_test_list = $this->UnitTest_model->board_reply_list_test($offset, $limit);

    for($i = 0 ; $i < count($board_reply_test_list); $i ++){

      $this->unit->use_strict(TRUE);

			$this->unit->run($board_reply_test_list[$i]->id, 'is_numeric', 'id_type');

      $this->unit->run($board_reply_test_list[$i]->board_id, 'is_numeric', 'board_id_type');

      $this->unit->run($board_reply_test_list[$i]->content, 'is_string', 'content_type');

      $this->unit->run($board_reply_test_list[$i]->reg_id, 'is_numeric', 'reg_id_type');

      $this->unit->run($board_reply_test_list[$i]->del_st, 'is_numeric', 'del_st_type');

		}
    echo $this->unit->report();
  }

  function law(){
    $offset = $this->input->get("offset");
    $limit = $this->input->get("limit");

    $law_test_list = $this->UnitTest_model->law_list_test($offset, $limit);


    for($i = 0 ; $i < count($law_test_list); $i ++){

      $this->unit->use_strict(TRUE);

      $this->unit->run($law_test_list[$i]->id, 'is_numeric', 'id_type');

      $this->unit->run($law_test_list[$i]->d1, 'is_null', 'd1_type');

      $this->unit->run($law_test_list[$i]->d2, 'is_null', 'd2_type');

      $this->unit->run($law_test_list[$i]->d3, 'is_null', 'd3_type');

      $this->unit->run($law_test_list[$i]->d4, 'is_null', 'd4_type');

      $this->unit->run($law_test_list[$i]->d5, 'is_null', 'd5_type');

      $this->unit->run($law_test_list[$i]->d6, 'is_null', 'd6_type');

      $this->unit->run($law_test_list[$i]->d7, 'is_null', 'd7_type');

      $this->unit->run($law_test_list[$i]->d8, 'is_null', 'd8_type');

      $this->unit->run($law_test_list[$i]->reg_id, 'is_numeric', 'reg_id_type');

    }
    echo $this->unit->report();
  }

  function law_model(){
    $offset = $this->input->get("offset");
    $limit = $this->input->get("limit");

    $law_model_test_list = $this->UnitTest_model->law_model_list_test($offset, $limit);


    for($i = 0 ; $i < count($law_model_test_list); $i ++){

      $this->unit->use_strict(TRUE);

      $this->unit->run($law_model_test_list[$i]->id, 'is_numeric', 'id_type');

      $this->unit->run($law_model_test_list[$i]->title, 'is_string', 'title_type');

      $this->unit->run($law_model_test_list[$i]->content, 'is_string', 'content_type');

      $this->unit->run($law_model_test_list[$i]->reg_id, 'is_numeric', 'reg_id_type');

      $this->unit->run($law_model_test_list[$i]->del_st, 'is_numeric', 'del_st_type');

    }
    echo $this->unit->report();
  }

  function log(){
    $offset = $this->input->get("offset");
    $limit = $this->input->get("limit");

    $log_test_list = $this->UnitTest_model->log_list_test($offset, $limit);


    for($i = 0 ; $i < count($log_test_list); $i ++){

      $this->unit->use_strict(TRUE);

      $this->unit->run($log_test_list[$i]->id, 'is_numeric', 'id_type');

      $this->unit->run($log_test_list[$i]->code, 'is_numeric', 'code_type');

      $this->unit->run($log_test_list[$i]->content_id, 'is_numeric', 'content_id_type');

      $this->unit->run($log_test_list[$i]->reg_id, 'is_numeric', 'reg_id_type');

    }
    echo $this->unit->report();
  }

  function user(){
    $offset = $this->input->get("offset");
    $limit = $this->input->get("limit");

    $user_test_list = $this->UnitTest_model->user_list_test($offset, $limit);


    for($i = 0 ; $i < count($user_test_list); $i ++){

      $this->unit->use_strict(TRUE);

      $this->unit->run($user_test_list[$i]->id, 'is_numeric', 'id_type');

      $this->unit->run($user_test_list[$i]->email, 'is_string', 'email_type');

      $this->unit->run($user_test_list[$i]->auth_code, 'is_string', 'auth_code_type');

    }
    echo $this->unit->report();
  }

  function user_info(){
    $offset = $this->input->get("offset");
    $limit = $this->input->get("limit");

    $user_info_test_list = $this->UnitTest_model->user_info_list_test($offset, $limit);


    for($i = 0 ; $i < count($user_info_test_list); $i ++){

      $this->unit->use_strict(TRUE);

      $this->unit->run($user_info_test_list[$i]->id, 'is_numeric', 'id_type');

      $this->unit->run($user_info_test_list[$i]->user_id, 'is_numeric', 'user_id_type');

      $this->unit->run($user_info_test_list[$i]->user_code, 'is_numeric', 'user_code_type');

      $this->unit->run($user_info_test_list[$i]->acc_st, 'is_numeric', 'acc_st_type');

    }
    echo $this->unit->report();
  }

}
