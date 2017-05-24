<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start("ob_gzhandler");
$array = array("a","b","c");
?>

<html lang="ko">
<head>
<title>Form Test</title>
</head>
<body>


  <?php echo validation_errors(); ?>

  <!-- <php echo form_open('/test/test_form_check'); ?> -->
  <form method="post" action="/test/test_form_check">

  <h5>Title</h5>
  <input type="text" name="board_title" value="<?php echo set_value('board_title'); ?>" size="50" />

  <h5>Content</h5>
  <input type="text" name="board_content" value="<?php echo set_value('board_content'); ?>" size="100" />

  <h5>User ID</h5>
  <input type="text" placeholder="1" name="user_id" value="<?php echo set_value('user_id'); ?>" size="10" />

  <div><hr><input type="submit" value="Submit" /></div>

  </form>



</body>
</html>
<?php
ob_end_flush();
?>
