<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->layout->setLayout("layout/user_layout_view");
	}
	public function index()
	{
		$this->layout->view("/user/main_view");
	}
	function test(){
		echo "test";
	}
}
