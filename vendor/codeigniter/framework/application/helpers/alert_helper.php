<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: dvmoomoodv
 * Date: 2017. 5. 19.
 * Time: 17:10
 */

/** *********************************************************************
 * Packages : helpers
 * File :
 * Comment :
 * Date : 20151209
 * Memo
 * =>
 *
 ********************************************************************** */
/**
 *
 *
 * ***** alert_helper.php
 * ***** 웹 페이지 alert창 호출 헬퍼
 *
 *
 */
if ( ! function_exists('alert'))
{
    // 경고메세지를 경고창으로
    function alert($msg='', $url='') {
        $CI =& get_instance();
        if (!$msg) $msg = 'This is an invalid approach to the website.';

        echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=".$CI->config->item('charset')."\">";
        echo "<script type='text/javascript'>alert('".$msg."');";
        if ($url)
            echo "location.replace('".$url."');";
        else
            echo "history.go(-1);";
        echo "</script>";
        exit;
    }
}

if ( ! function_exists('alert_close'))
{
    // 경고메세지 출력후 창을 닫음
    function alert_close($msg) {
        $CI =& get_instance();

        echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=".$CI->config->item('charset')."\">";
        //echo "<script type='text/javascript'> alert('".$msg."'); window.close(); </script>";
        echo "<script type='text/javascript'> alert('".$msg."'); window.close(); </script>";
        exit;
    }
}

if ( ! function_exists('alert_only'))
{
    // 경고메세지만 출력
    function alert_only($msg) {
        $CI =& get_instance();

        echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=".$CI->config->item('charset')."\">";
        echo "<script type='text/javascript'> alert('".$msg."'); </script>";
        exit;
    }
}

if ( ! function_exists('alert_continue'))
{
    function alert_continue($msg){
        $CI =& get_instance();

        echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=".$CI->config->item('charset')."\">";
        echo "<script type='text/javascript'> alert('".$msg."'); </script>";
    }
}
?>