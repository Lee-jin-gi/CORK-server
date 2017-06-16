
   <main>
       <div class="container">
           <div class="row">

               <div class="col s12">

                 <article id="debate_area">
                     <header>
                         <h1></h1>
                     </header>
                     <nav class="nav-extended">
                     <div class="nav-content">
                       <span class="nav-title">토론 게시판</span>
               <a href="/admin/debate/write" class="btn-floating btn-large waves-effect halfway-fab waves-light red"><i class="material-icons">mode_edit</i></a>
               </div>
             </nav>
               <br>
                     <table class="bordered centered highlight">
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
                                 <td scope="row"><?php echo $lt -> id;?></td>
                                 <td><a href="/admin/debate/info?bid=<?=$lt->id?>"> <?php echo $lt -> title;?> </a></td>
                                 <td scope="row"><?php echo $lt -> reply_cnt;?></td>
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
                     <hr>
                     <div style="text-align : center;">
                            <ul class="pagination"><?php echo $pagination;?></ul>
                          </div>
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
