
   <main>
       <div class="container">
           <div class="row">

               <div class="col s12">
                 <div class="divider"></div>
<div class="section">
  <h5><?php echo $debate_content -> title ?></h5>
</div>
<div class="divider"></div>
  <div class="section">
    <form id="bm_form" method="post" action="/admin/book_mark">
      <input name="debate_id" type="hidden" value="<?= $debate_content -> id?>"/>
      <input name="user_id" type="hidden" value="100"/>

      <!-- 북마크 상태 받아와서 체크해주는 부분 -->
      <p style="text-align: right;"><input name="chg_st" type="checkbox" id="book_mark" <?php
      if(isset($bm_status)){
        if($bm_status -> chg_st == 1){
          echo "checked";
        }
      }
       ?>/><label for="book_mark">북마크</label></input></p>
    </form>
  <p class="date" style="text-align: right;"><?php echo $debate_content -> reg_date ?></p>
  <p class="reg_id" style="text-align: right;"> <?php echo $debate_content -> reg_id ?></p>

  <p><?php echo $debate_content -> content ?></p>
</div>
</div>

</div>

                 <div style="text-align: right;">

                   <a href="/admin/debate/edit?bid=<?php echo $debate_content -> id ?>">수정하기</a> | <a href="#" onclick="del_chk(<?php echo $debate_content -> id ?>);">삭제하기</a>
</div>
<div class="divider"></div>
<?php echo validation_errors(); ?>
<div class="row">
<form method="post" action="/admin/debate/reply?bid=<?= $debate_content->id?>" id="reply_form">
  <div class="input-field col s2">
             <input id="input-id" name="user_id" type="number" class="validate" placeholder="user_id">
  </div>
          <div class="input-field col s8">
             <textarea id="input-content" class="validate" name="reply_content" form="reply_form" cols="40" rows="10" placeholder="댓글을 입력해 주세요." ></textarea>
           </div>


         <div class="input-field col s2">
           <button class="btn waves-effect waves-light" type="submit" name="action">댓글 업로드
               <i class="material-icons right">send</i>
             </button>
           </div>
</form>

</div>
<div class="divider"></div>

<?php if(count($reply_list) == 0){
  echo "<b>댓글 없음</b>";
}else{  ?>
       <table class="striped">
           <thead>
               <tr>
                   <th scope="col">번호</th>
                   <th scope="col">댓글</th>
                   <th scope="col">작성자</th>
                   <th scope="col">작성일</th>
               </tr>
           </thead>
           <tbody>
               <?php
$num = 1;
   foreach($reply_list as $lt)
   {

              ?>
               <tr>
                   <th scope="row"><?php echo $num++;?></th>
                   <td scope="row"><?php echo $lt -> content;?> </a></td>
                   <td><?php echo $lt -> reg_id;?></td>
                   <td>
                   <time datetime="<?php echo mdate("%Y년 %m월 %j일", human_to_unix($lt -> reg_date)); ?>">
                       <?php echo mdate("%Y년 %m월 %j일", human_to_unix($lt -> reg_date));?>
                   </time></td>
               </tr>
               <?php
               }
              ?>
           </tbody>

       </table>
<?php } ?>
<hr>
</div>
   </main>



   <!--  Scripts-->
   <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
   <script>
       $(".button-collapse").sideNav();
   </script>

   <script>
   function del_chk(debate_id){
     if(confirm("삭제 하시겠습니까?")){
       location.href = "/admin/debate/remove?bid=" + debate_id;
       return true;
     }else{
       return false;
     }
   }

   $(document).ready(function(){
     $("#book_mark").change(function(){
       if($("#book_mark").is(":checked")){
         alert("북마크 등록");
       }else{
         alert("북마크 해제");
       }
      $('#bm_form').submit();
     });
   });
   </script>
