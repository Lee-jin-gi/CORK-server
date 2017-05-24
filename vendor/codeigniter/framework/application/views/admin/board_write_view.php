


   <main>
       <div class="container">
           <div class="row">

               <div class="col s12">

                 <?php echo validation_errors(); ?>

                 <!-- <php echo form_open('/test/test_form_check'); ?> -->
                 <form method="post" action="/admin/board/add">



                 <div class="input-field col s6">
                    <input id="input-title" name="board_title" type="text" class="validate">
                    <label for="input-title">Title</label>
                  </div>
                  <div class="input-field col s6">
                     <input id="input-content" name="board_content" type="text" class="validate">
                     <label for="input-content">Content</label>
                   </div>
                   <div class="input-field col s6">
                      <input id="input-id" name="user_id" type="number" class="validate">
                      <label for="input-id">User id</label>
                    </div>

                 <div><input type="submit" value="Submit" /></div>

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
