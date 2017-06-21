<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct() {
		parent::__construct ();
		gitter("user enter");
		$this->layout->setLayout("layout/user_layout_view");
	}

	public function index(){
		redirect("/user/dashboard");
	}
	public function dashboard(){
		$this->layout->view("user/main_view");
	}

	public function login(){

	}
	public function register(){

	}
	public function logout(){

	}


	public function search(){

	}
	/**
	* blank
	* info
	* edit
	* update
	*
	* find
	* password
	* password/edit
	* password/update
	*
	* @return [type] [description]
	*/
	public function account(){
		$page = $this->uri->segment(2);
		$action = $this->uri->segment(3);

		// if($action == "password"){
		// 	$sub_action = $this->uri->segment(4);
		// 	if (method_exists ( $this , $action . '_' . $sub_action )) {
		// 		$this->{ $action . '_' . $sub_action }();
		// 	}
		// 	else{
		// 		show_404();
		// 	}
		// }else{
			if (method_exists ( $this , $page . '_' . $action )) {
				$this->{ $page . '_' . $action }();
			}
			else{
				show_404();
			}
		// }
	}
	private function account_info(){
		echo "test account info";
	}
	private function account_edit(){
		echo "test account edit";
	}
	private function account_update(){
		echo "test accont update";
	}
	private function account_find(){
		echo "test account find";
	}


	public function password(){
		$page = $this->uri->segment(2);
		$action = $this->uri->segment(3);

		if (method_exists ( $this , $page . '_' . $action )) {
			$this->{ $page . '_' . $action }();
		}
		else{
			show_404();
		}
	}
	private function password_edit(){
		echo "test password edit";
	}
	private function password_update(){
		echo "test password update";
	}


	/**
	 * blank
	 * list
	 * info
	 * [reference description]
	 * @return [type] [description]
	 */
	public function reference(){
		$page = $this->uri->segment(2);
		$action = $this->uri->segment(3);

		if (method_exists ( $this , $page . '_' . $action )) {
			$this->{ $page . '_' . $action }();
		}
		else{
			show_404();
		}
	}
	private function reference_list(){

	}
	private function reference_info(){

	}


	/**
	 * blank
	 * list
	 * info
	 * write
	 * add
	 * edit
	 * update
	 * remove
	 * @return [type] [description]
	 *
	 */
	public function activity(){
		$page = $this->uri->segment(2);
		$action = $this->uri->segment(3);

		if (method_exists ( $this , $page . '_' . $action )) {
			$this->{ $page . '_' . $action }();
		}
		else{
			show_404();
		}
	}
	private function activity_list(){

	}
	private function activity_info(){

	}
	private function activate_write(){

	}
	private function  activate_add(){

	}
	private function activate_edit(){

	}
	private function activate_update(){

	}
	private function activate_remove(){

	}

	 /**
 	 * Encodes string for use in XML
 	 *
 	 * list
 	 * @param       string  $str    Input string
 	 * @return      string
 	 */
	public function history(){
		$page = $this->uri->segment(2);
		$action = $this->uri->segment(3);

		if (method_exists ( $this , $page . '_' . $action )) {
			$this->{ $page . '_' . $action }();
		}
		else{
			show_404();
		}
	}
	/**
	 * Encodes string for use in XML
	 *
	 * @param       string  $str    Input string
	 * @return      string
	 */
	private function history_list(){
		echo "test";
	}

	 /**
 	 * Encodes string for use in XML
	 * list
	 * info
	 * write
	 * add
	 * update
	 * remove
 	 * @param       string  $str    Input string
 	 * @return      string
 	 */
	 public function board(){
		 $page = $this->uri->segment(2);
		 $action = $this->uri->segment(3);

		 if (method_exists ( $this , $page . '_' . $action )) {
		 	$this->{ $page . '_' . $action }();
		 }
		 else{
		 	show_404();
		 }
	 }


	 /**
	  * Encodes string for use in XML
		*
		* @param       string  $str    Input string
		* @return      string
		*/
	 private function board_list(){

	 }
	 /**
	  * Encodes string for use in XML
		*
		* @param       string  $str    Input string
		* @return      string
		*/
	 private function board_info(){

	 }
	 /**
	  * Encodes string for use in XML
		*
		* @param       string  $str    Input string
		* @return      string
		*/
	 private function board_write(){

	 }
	 /**
	  * Encodes string for use in XML
		*
		* @param       string  $str    Input string
		* @return      string
		*/
	 private function board_add(){

	 }
	 /**
	  * Encodes string for use in XML
		*
		* @param       string  $str    Input string
		* @return      string
		*/
	 private function board_update(){

	 }
	 /**
	  * Encodes string for use in XML
		*
		* @param       string  $str    Input string
		* @return      string
		*/
	 private function board_remove(){

	 }
}
