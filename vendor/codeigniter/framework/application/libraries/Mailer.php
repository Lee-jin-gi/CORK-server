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
class Mailer{
  public function Mailer() {
    //require_once APPPATH.'/third_party/PHPMailer/class.phpmailer.php'; // older
    require_once APPPATH.'/third_party/PHPMailer/PHPMailerAutoload.php'; // 2016.12.27 phpmailer v5.2.10
    // require_once BASEPATH.'/third_party/PHPMailer/PHPMailerAutoload.php'; //phpmailer v5.2.19

  }
}
