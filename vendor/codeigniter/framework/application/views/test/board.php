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

  <article id="board_area">
      <header>
          <h1></h1>
      </header>
<div style="width: 450px; text-align: right;">
<a href="/<?php echo $this -> uri -> segment(1); ?>/test_form"><button>글쓰기</button></a>
</div>
<br>
      <table cellpadding="0" cellspacing="0" style="width: 500px;">
          <thead>
              <tr>
                  <th scope="col">번호</th>
                  <th scope="col">제목</th>
                  <th scope="col">작성자</th>
                  <th scope="col">작성일</th>
              </tr>
          </thead>
          <tbody>
              <?php
  foreach($board_list as $lt)
  {
             ?>
              <tr>
                  <th scope="row"><?php echo $lt -> id;?></th>
                  <td><a href="/<?php echo $this -> uri -> segment(1);?>/view/<?php echo $lt -> id;?>"> <?php echo $lt -> title;?> </a></td>
                  <td><?php echo $lt -> reg_id;?></td>
                  <td>
                  <time datetime="<?php echo mdate("%Y-%M-%j", human_to_unix($lt -> reg_date)); ?>">
                      <?php echo mdate("%Y-%M-%j", human_to_unix($lt -> reg_date));?>
                  </time></td>
              </tr>
              <?php
              }
             ?>
          </tbody>

          <tfoot>
            <tr>
                <th colspan="5"><?php echo $pagination;?></th>
            </tr>
        </tfoot>
      </table>
  </article>



</body>
</html>
<?php
ob_end_flush();
?>
