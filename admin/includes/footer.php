  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="js/script.js">
     <script src="js/dropzone.js"> 


   
 </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Views',<?php echo $session->count; ?>],
          ['Photos',<?php echo Photos::count_all();?>],
          ['Users',<?php echo User::count_all();?>],
          ['Commetns',<?php echo Comment::count_all();?>],
        ]);

        var options = {
          title: 'chart',
          pieHole: 0.4,
          backgroundColor:'transparent',
          pieSliceText:'label'
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
</body>

</html>
