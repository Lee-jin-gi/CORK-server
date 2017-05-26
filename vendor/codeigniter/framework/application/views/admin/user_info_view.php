
   <main>
       <div class="container">
           <div class="row">

               <div class="col s12">

                 <div>
                   <div style="display: inline-block; width: 80%;">
                     <span class="id">
                       <!-- $this->db->select('u.id, u.email, u.reg_date, i.user_code, i.acc_st, i.expire_date'); -->
                     id : <?= $user_info->id  ?>
                     </span>
                   </div>
                   <p class="email" style="display: inline-block"><?php echo $user_info -> email ?></p>
                   <hr>
                   <div>
                     <p class="reg_date" style="text-align: right;"> <?php echo $user_info -> reg_date ?></p>
                     <div class="content">
                       user code : <?php echo $user_info -> user_code ?> <br>
                       acc_st : <?php echo $user_info -> acc_st ?> <br>
                       expire_date : <?php echo $user_info -> expire_date ?> <br>
                     </div>
                   </div>
                 <hr>

                   <a href="/admin/user/edit?bid=<?php echo $user_info -> id ?>">수정하기</a> | <a href="#" onclick="reset_chk(<?php echo $user_info -> id ?>);">비밀번호 초기화</a>
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
   function reset_chk(user_id){
     if(confirm("비밀번호를 초기화 하시겠습니까?")){
       location.href = "/admin/user/reset?bid=" + user_id;
       return true;
     }else{
       return false;
     }
   }
   </script>
