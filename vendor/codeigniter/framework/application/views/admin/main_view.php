
   <main>
       <div class="container">
           <div class="row">

               <div class="col s12">

                   <div id="structure" class="section scrollspy">

                       컨텐츠관리자 사용자관리자 역할을 동시수행하는 페이지 개발
                       <h4>Introduction</h4>
                       <p class="caption">This is a slide out menu. You can add a dropdown to your sidebar by using our collapsible component. If you want to see a demo, our sidebar will use this on smaller screens. To use this in conjunction with a fullscreen navigation,
                           you have to use two copies of the same UL.</p>


                       <ul id="slide-out" class="side-nav" style="transform: translateX(-100%);">
                           <li>
                               <div class="userView">
                                   <div class="background">
                                       <img src="images/office.jpg">
                                   </div>
                                   <a href="#!user"><img class="circle" src="images/yuna.jpg"></a>
                                   <a href="#!name"><span class="white-text name">John Doe</span></a>
                                   <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
                               </div>
                           </li>
                           <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
                           <li><a href="#!">Second Link</a></li>
                           <li>
                               <div class="divider"></div>
                           </li>
                           <li><a class="subheader">Subheader</a></li>
                           <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
                       </ul>



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
