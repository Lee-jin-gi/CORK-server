
   <main>
       <div class="container">
           <div class="row">

               <div class="col s12">

                 <div>
                   <div style="display: inline-block; width: 80%;">
                     <span class="title">
                     <?php echo $board_content -> title ?>
                     </span>
                   </div>
                   <p class="date" style="display: inline-block"><?php echo $board_content -> reg_date ?></p>
                   <hr>
                   <div>
                     <p class="reg_id" style="text-align: right;"> <?php echo $board_content -> reg_id ?></p>
                     <div class="content">
                       <?php echo $board_content -> content ?>
                     </div>
                   </div>
                 <hr>

                   <a href="/admin/board/edit?bid=<?php echo $board_content -> id ?>">수정하기</a> | <a href="#" onclick="del_chk(<?php echo $board_content -> id ?>);">삭제하기</a>
                 </div>

           </div>
       </div>

   </main>



   <!--  Scripts-->
   <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
   <script>
       $(".button-collapse").sideNav();
   </script>

   <script>
   function del_chk(board_id){
     if(confirm("삭제 하시겠습니까?")){
       location.href = "/admin/board/remove?bid=" + board_id;
       return true;
     }else{
       return false;
     }
   }
   </script>
