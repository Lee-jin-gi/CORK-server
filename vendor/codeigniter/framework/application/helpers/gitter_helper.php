<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** *********************************************************************
 * Packages : helpers
 * File :
 * Comment :
 * Date : 20170531
 * Memo
 * =>
 *
 ********************************************************************** */

if ( ! function_exists('gitter'))
{
  // (string) $message - message to be passed to Slack
  // (string) $room - room in which to write the message, too
  // (string) $icon - You can set up custom emoji icons to use with each message
  function gitter($message, $room = "client_alarm", $icon = ":longbox:") {
    //$room = ($room) ? $room : "engineering";
    // $data = "payload=" . json_encode(array(
    //         "channel"       =>  "#{$room}",
    //         "text"          =>  $message,
    //         "icon_emoji"    =>  $icon
    //     ));
    $data = "message=".$message;

    // You can get your webhook endpoint from your Slack settings
    $ch = curl_init("https://webhooks.gitter.im/e/c72c03246f8b2fd62492");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
  }
}
