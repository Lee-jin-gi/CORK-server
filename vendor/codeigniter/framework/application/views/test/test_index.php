<?php
  $array = array("a","b","c");
?>


<html>
<body>

  <a href="/test/insert_law"><button>insert law</button></a>
  <hr>

  <a href="/test/insert_law_model"><button>insert law model</button></a>
  <hr>
  <hr>
  <p>
    <strong>Board List</strong>
    <br>
    <!-- <?php print_r($test_info); ?> -->
    <?php print_r($board_list); ?>
  </p>
  <hr>


  <p>
    <strong>Login Info</strong>
    <br>
    <?php print_r($login_user_info); ?>
  </p>
  <hr>


  <p>
    <strong>Board Reply List (reg_id=-1)</strong>
    <br>
    <?php print_r($board_reply_list); ?>
  </p>
  <hr>


  <!-- <p>
    <strong>Super Admin List</strong>
    <br>
    <php print_r($super_admin_list); ?>
  </p>
  <hr> -->


  <p>
    <strong>Law 1-1 Info</strong>
    <br>
    <?php print_r($law_info); ?>
  </p>
  <hr>


  <p>
    <strong>Law Model List</strong>
    <br>
    <?php print_r($law_model_info); ?>
  </p>
  <hr>

  <p>
    <strong>Debate Info</strong>
    <br>
    <?php print_r($debate_info); ?>
  </p>
  <hr>

  <p>
    <strong>Debate Reply List</strong>
    <br>
    <?php print_r($debate_reply_list); ?>
  </p>
  <hr>

  <!-- <p>
    <strong>Message List</strong>
    <br>
    <php print_r($message_list); ?>
  </p>
  <hr> -->

</body>
</html>
