
   <main>
       <div class="container">
           <div class="row">

               <div class="col s12">

                 <article id="user_list_area">
                     <header>
                         <h1></h1>
                     </header>
               <div style="width: 450px; text-align: right;">
               </div>
               <br>
                     <table class="striped">
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
                                 <th scope="row"><?php echo $lt -> id;?></th>
                                 <td><a href="/admin/user/info?bid=<?=$lt->id?>"> <?php echo $lt -> email;?> </a></td>
                                 <td><?php echo $lt -> auth_code;?></td>
                                 <td>
                                 <time datetime="<?php echo mdate("%Y년 %m월 %j일", human_to_unix($lt -> reg_date)); ?>">
                                     <?php echo mdate("%Y년 %m월 %j일", human_to_unix($lt -> reg_date));?>
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

           </div>
       </div>

   </main>



   <!--  Scripts-->
   <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
   <script>
       $(".button-collapse").sideNav();
   </script>
