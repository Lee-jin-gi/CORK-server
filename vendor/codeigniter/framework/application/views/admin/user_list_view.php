
   <main>

     <?php

     $std = "";
     $value = "";
     for($i=0; $i<count($user_count_per_month); $i++){
       $std .= "'" . $user_count_per_month[$i]->month . "',";
       $value .= "'" . $user_count_per_month[$i]->count . "',";
     }

     $label =  substr($std, 0, -1);
     $data = substr($value, 0, -1);

     ?>

     <canvas id="User_count_bar_chart" width="300px" height="100px"></canvas>
          <script>
          var ctx = document.getElementById("User_count_bar_chart").getContext('2d');
          var user_count_bar_chart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: [<?= $label ?>],
                datasets: [{
                  label: "TEST",
                  data: [<?= $data ?>],
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
                   ],
                   borderWidth: 1
                }]
              },
              options: {
                scales: {
                  xAxes: [{
                    gridLines: {
                      offsetGridLines: true
                    }
                  }]
                }
              }
          });

           </script>



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

             <hr><br>
                          <div style="text-align: right;">
                           <a href="/admin/user/download?type=<?= $this->input->get('type'); ?>" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Download</a>
                          </div>
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
