
   <main>
       <div class="container">
           <div class="row">

               <div class="col s12">

                <form method="post" action="/admin/user/update?bid=<?=$user_info->id?>">

                 <h5>권한 코드 : <?= $user_info->user_code ?></h5>
                 <hr>
                     <p>
                 <input class="with-gap" id="test1" type="radio" name="user_code" value="-1" <?php if($user_info->user_code == -1) echo "checked";?>>
                 <label for="test1">테스트 계정</label>
               </p>
                 <p><input type="radio" name="user_code" value="100" id="test2" <?php if($user_info->user_code == 100) echo "checked";?>><label for="test2">서브 관리자</label></p>
                 <p><input type="radio" name="user_code" value="130" id="test3" <?php if($user_info->user_code == 130) echo "checked";?>><label for="test3">사용자 관리자</label></p>
                 <p><input type="radio" name="user_code" value="160" id="test4" <?php if($user_info->user_code == 160) echo "checked";?>><label for="test4">컨텐츠 관리자</label></p>
                 <p><input type="radio" name="user_code" value="50" id="test5" <?php if($user_info->user_code == 50) echo "checked";?>><label for="test5">법률 전문가</label></p>
                 <p><input type="radio" name="user_code" value="60" id="test6" <?php if($user_info->user_code == 60) echo "checked";?>><label for="test6">국회의원</label></p>
                 <p><input type="radio" name="user_code" value="70" id="test7" <?php if($user_info->user_code == 70) echo "checked";?>><label for="test7">기타</label></p>
                 <p><input type="radio" name="user_code" value="10" id="test8" <?php if($user_info->user_code == 10) echo "checked";?>><label for="test8">일반회원</label></p>
                 <p><input type="radio" name="user_code" value="0" id="test9" <?php if($user_info->user_code == 0) echo "checked";?>><label for="test9">비회원</label></p>
<hr>
                <input type="date" name="expire_date" class="datepicker" placeholder="calendar" value="<?= $user_info->expire_date?>">


                 <div><hr><input onclick="edit_chk();" type="submit" value="Update" /></div>


                 </form>

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
   function edit_chk(){
     if(confirm("권한을 수정하시겠습니까?")){
       return true;
     }else{
       return false;
     }
   }

   $('.datepicker').pickadate({
   selectMonths: true, // Creates a dropdown to control month
   selectYears: 15, // Creates a dropdown of 15 years to control year
   format: 'yyyy-m-d'
 });
   </script>
