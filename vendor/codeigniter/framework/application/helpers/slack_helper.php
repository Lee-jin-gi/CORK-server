<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** *********************************************************************
 * Packages : helpers
 * File :
 * Comment :
 * Date : 20151209
 * Memo
 * =>
 *
 ********************************************************************** */

if ( ! function_exists('slack'))
{
  // (string) $message - message to be passed to Slack
  // (string) $room - room in which to write the message, too
  // (string) $icon - You can set up custom emoji icons to use with each message
  function slack($message, $room = "client_alarm", $icon = ":longbox:") {
    //$room = ($room) ? $room : "engineering";
    $data = "payload=" . json_encode(array(
            "channel"       =>  "#{$room}",
            "text"          =>  $message,
            "icon_emoji"    =>  $icon
        ));

    // You can get your webhook endpoint from your Slack settings
    $ch = curl_init("https://hooks.slack.com/services/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");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
  }
}
