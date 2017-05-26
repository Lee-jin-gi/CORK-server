
   <main>
       <div class="container">
           <div class="row">

               <div class="col s12">

                 <article id="debate_area">
                     <header>
                         <h1></h1>
                     </header>
               <div style="width: 450px; text-align: right;">
               <a href="/admin/debate/write" class="waves-effect waves-light btn">추가하기</a>
               </div>
               <br>
                     <table class="striped">
                         <thead>
                             <tr>
                                 <th scope="col">번호</th>
                                 <th scope="col">제목</th>
                                 <th scope="col">댓글 갯수</th>
                                 <th scope="col">작성자</th>
                                 <th scope="col">작성일</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                 foreach($debate_list as $lt)
                 {
                            ?>
                             <tr>
                                 <th scope="row"><?php echo $lt -> id;?></th>
                                 <td><a href="/admin/debate/info?bid=<?=$lt->id?>"> <?php echo $lt -> title;?> </a></td>
                                 <th scope="row"><?php echo $lt -> reply_cnt;?></th>
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
