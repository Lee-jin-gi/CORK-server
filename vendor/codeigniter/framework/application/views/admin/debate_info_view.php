
   <main>
       <div class="container">
           <div class="row">

               <div class="col s12">

                 <div>
                   <div style="display: inline-block; width: 80%;">
                     <span class="title">
                     <?php echo $debate_content -> title ?>
                     </span>
                   </div>
                   <p class="date" style="display: inline-block"><?php echo $debate_content -> reg_date ?></p>
                   <hr>
                   <div>
                     <p class="reg_id" style="text-align: right;"> <?php echo $debate_content -> reg_id ?></p>
                     <div class="content">
                       <?php echo $debate_content -> content ?>
                     </div>
                   </div>
                 <hr>

                   <a href="/admin/debate/edit?bid=<?php echo $debate_content -> id ?>">수정하기</a> | <a href="#" onclick="del_chk(<?php echo $debate_content -> id ?>);">삭제하기</a>
                 </div>

           </div>
       </div>
<hr>
<?php echo validation_errors(); ?>

<form method="post" action="/admin/debate/reply?bid=<?= $debate_content->id?>" id="reply_form">

 <div class="input-field col s6">
    <textarea id="input-content" class="validate" name="reply_content" form="reply_form" cols="40" rows="10" placeholder="댓글을 입력해 주세요." ></textarea>
    <input id="input-id" name="user_id" type="number" class="validate" placeholder="user_id">
  </div>

<div><input type="submit" value="댓글 업로드" /></div>

</form>
<hr>

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
   </script>
