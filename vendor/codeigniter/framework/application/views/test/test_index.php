<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start("ob_gzhandler");
$array = array("a","b","c");
?>

<html lang="ko">
<head>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        function a(){
            $.ajax({
                type:"POST",
                url:"/test/insert_law",
                dataType:"JSON",
                data:{
                    data : "data"
                },
                success:function(data){
                   alert("success");

                },
                error:function(xhr,status,error){
                    alert("code:"+xhr.status+"\n"+"message:"+xhr.responseText+"\n"+"error:"+error);
                }
            });
        }

    </script>
</head>
<body>


<!--    <form action="/test/insert_law?12312312">-->
<!--        <button>insert law</button>-->
<!--    </form>-->
    <span onclick="a()">insert law</span>
    <hr>
    <form action="/test/insert_law_model">
        <button>insert law</button>
    </form>


  <hr>
  <p>
    <strong>Board List</strong>
    <br>
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
<?php
ob_end_flush();
?>
