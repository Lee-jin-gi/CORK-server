
   <main>
       <div class="container">
           <div class="row">

               <div class="col s12">

                 <article id="book_mark_area">
                     <header>
                         <h1></h1>
                     </header>
                     <nav class="nav-extended">
                     <div class="nav-content">
      <span class="nav-title">북마크</span>

    </div>
  </nav>
               <!-- <div style="text-align: right;">
                <a href="/admin/board/write" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
               </div> -->
               <br>
                     <table class="bordered centered highlight">
                         <thead>
                             <tr>
                                 <th scope="col">번호</th>
                                 <th scope="col">토론 번호</th>
                                 <th scope="col">토론 제목</th>
                                 <th scope="col">등록일</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                             $book_mark_id = 1;
                 foreach($book_mark_list as $lt)
                 {

                            ?>
                             <tr>
                                 <td scope="row" class="centered"><?php echo $book_mark_id++ ?></td>
                                 <td scope="row"><?php echo $lt -> debate_id;?></td>
                                 <td><a href="/admin/debate/info?bid=<?=$lt->debate_id?>"> <?php echo $lt -> title;?> </a></td>
                                 <td>
                                 <time datetime="<?php echo mdate("%Y년 %m월 %j일", human_to_unix($lt -> chg_date)); ?>">
                                     <?php echo mdate("%Y년 %m월 %j일", human_to_unix($lt -> chg_date));?>
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
