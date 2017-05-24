
   <main>
       <div class="container">
           <div class="row">

               <div class="col s12">

                <form method="post" action="/admin/board/update?bid=<?=$board_content->id?>">
                 <h5>Title</h5>
                 <input type="text" name="board_title" value="<?php echo $board_content -> title ?>" size="50" />

                 <h5>Content</h5>
                 <input type="text" name="board_content" value="<?php echo $board_content -> content ?>" size="100" />

                 <h5>User ID</h5>
                 <input type="text" placeholder="1" name="user_id" value="<?php echo $board_content -> reg_id ?>" size="10" />

                 <div><hr><input type="submit" value="Edit" /></div>

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
