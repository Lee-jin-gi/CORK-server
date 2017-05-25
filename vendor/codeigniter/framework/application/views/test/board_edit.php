<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start("ob_gzhandler");
$array = array("a","b","c");
?>

<html lang="ko">
<head>
<title>Board Content Edit</title>
</head>
<body>


  <?php echo validation_errors(); ?>

  <!-- <php echo form_open('/test/test_form_check'); ?> -->
  <form method="get" action="/admin/board/update?bid=<?=$board_content->id?>">
  <h5>Title</h5>
  <input type="text" name="board_title" value="<?php echo $board_content -> title ?>" size="50" />

  <h5>Content</h5>
  <input type="text" name="board_content" value="<?php echo $board_content -> content ?>" size="100" />

  <h5>User ID</h5>
  <input type="text" placeholder="1" name="user_id" value="<?php echo $board_content -> reg_id ?>" size="10" />

  <div><hr><input type="submit" value="Edit" /></div>

  </form>



</body>
</html>
<?php
ob_end_flush();
?>
