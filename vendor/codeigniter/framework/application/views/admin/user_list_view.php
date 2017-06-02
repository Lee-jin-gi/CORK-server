
   <main>
       <div class="container">
           <div class="row">

               <div class="col s12">

                 <article id="user_list_area">
                     <header>
                         <h1></h1>
                     </header>
                     <nav class="nav-extended">
                     <div class="nav-content">
                       <span class="nav-title">사용자 리스트</span>
               </div>
             </nav>
               <br>
                     <table class="bordered centered highlight">
                         <thead>
                             <tr>
                                 <th scope="col">번호</th>
                                 <th scope="col">이메일</th>
                                 <th scope="col">인증코드</th>
                                 <th scope="col">가입일</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                 foreach($user_list as $lt)
                 {
                            ?>
                             <tr>
                                 <td scope="row"><?php echo $lt -> id;?></td>
                                 <td><a href="/admin/user/info?bid=<?=$lt->id?>"> <?php echo $lt -> email;?> </a></td>
                                 <td style="width: 200px; text-overflow: ellipsis; overflow: hidden; display: inline-block;"><?php echo $lt -> auth_code;?></td>
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
                       <hr>
                       <div style="text-align : center;">
                              <ul class="pagination"><?php echo $pagination;?></ul>
                            </div>
                     </table>
                 </article>

           </div>
       </div>

   </main>



   <!--  Scripts-->
   <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
   <script>
       $(".button-collapse").sideNav();
   </script>
