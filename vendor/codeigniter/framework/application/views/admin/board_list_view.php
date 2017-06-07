
   <main>

<?php

$std = "";
$value = "";
for($i=0; $i<count($board_count_per_month); $i++){
  $std .= "'" . $board_count_per_month[$i]->month . "',";
  $value .= "'" . $board_count_per_month[$i]->count . "',";
}

$label =  substr($std, 0, -1);
$data = substr($value, 0, -1);

?>

<canvas id="Board_count_bar_chart" width="300px" height="100px"></canvas>
     <script>
     var ctx = document.getElementById("Board_count_bar_chart").getContext('2d');
     var board_count_bar_chart = new Chart(ctx, {
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


    <!-- <script>
     var ctx = document.getElementById("myChart").getContext('2d');
     var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
             datasets: [{
                 label: '# of Votes',
                 data: [<= count($board_list) ?>, 19, 3, 5, 2, 3],
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255,99,132,1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 yAxes: [{
                     ticks: {
                         beginAtZero:true
                     }
                 }]
             }
         }
     });
     </script> -->

       <div class="container">
           <div class="row">

               <div class="col s12">

                 <article id="board_area">
                     <header>
                         <h1></h1>
                     </header>
                     <nav class="nav-extended">
                     <div class="nav-content">
      <span class="nav-title">일반 게시판</span>
            <a href="/admin/board/write" class="btn-floating btn-large waves-effect halfway-fab waves-light red"><i class="material-icons">mode_edit</i></a>

    </div>
  </nav>
  <hr><br>
               <div style="text-align: right;">
                <a href="/admin/board/download" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Download</a>
               </div>

               <br>
                     <table class="bordered centered highlight">
                         <thead>
                             <tr>
                                 <th scope="col">번호</th>
                                 <th scope="col">제목</th>
                                 <th scope="col">댓글갯수</th>
                                 <th scope="col">작성자</th>
                                 <th scope="col">작성일</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                 foreach($board_list as $lt)
                 {
                            ?>
                             <tr>
                                 <td scope="row" class="centered"><?php echo $lt -> id;?></td>
                                 <td><a href="/admin/board/info?bid=<?=$lt->id?>"> <?php echo $lt -> title;?> </a></td>
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
