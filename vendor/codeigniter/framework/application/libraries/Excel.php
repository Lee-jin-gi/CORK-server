<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** *********************************************************************
 * Packages : libraries
 * File :
 * Comment :
 * Date : 20151209
 * Memo
 * =>
 *
 ********************************************************************** */
require_once APPPATH."/third_party/PHPExcel/Classes/PHPExcel.php"; 
require_once APPPATH.'/third_party/PHPExcel/Classes/PHPExcel/IOFactory.php';
class Excel extends PHPExcel { 
    public function __construct() { 
        parent::__construct(); 
    } 
}