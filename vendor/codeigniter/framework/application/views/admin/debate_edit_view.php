
   <main>
       <div class="container">
           <div class="row">

               <div class="col s12">

                <form method="post" action="/admin/debate/update?bid=<?=$debate_content->id?>">
                 <h5>Title</h5>
                 <input type="text" name="debate_title" value="<?php echo $debate_content -> title ?>" size="50" />

                 <h5>Content</h5>
                 <input type="text" name="debate_content" value="<?php echo $debate_content -> content ?>" size="100" />

                 <h5>User ID</h5>
                 <input type="text" placeholder="1" name="user_id" value="<?php echo $debate_content -> reg_id ?>" size="10" />

                 <div class="input-field col s2">
                   <button class="btn waves-effect waves-light" type="submit" name="action">Edit
                       <i class="material-icons right">send</i>
                     </button>
                   </div>

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
