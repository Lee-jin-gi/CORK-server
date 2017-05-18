<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
	public function index()
	{
    $this->layout->setLayout("layout/landing_layout_view");
		$this->layout->view("/landing/main_view");
	}
	function test(){
		echo "test";
	}
}
