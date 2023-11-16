@extends('layouts.admin')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<html>
  <head>
   <div class="container-fluid"> 
    <div class="container1" style="margin-top: 30px;">
      <div class="row">
        <div class="col-lg-6">

            <div class="panel-heading">
              <h3 class="panel-title" style="text-align: center;margin-bottom: 22px;">Duration Report</h3>
            </div>
            <div class="panel-body">
              <div id="pie_chart" style="width:100%; height:450px;">
                <script type="text/javascript">
                 $(document).ready(function() {

                  var analytics = <?php echo $duration_percentage;?>

         //console.log(analytics);
        //alert(analytics);
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        //alert($category_name);

        var category_name = $('#duration_percentage').val();




        function drawChart()
        {
          var data = google.visualization.arrayToDataTable(analytics);
          var options = {
                        //title: 'Indian Language Use',
                        //legend: 'none',
                       //legend.position: ['top', 'bottom'],
                       animation:
                       {
                         duration: 1000,
                         easing: 'in',
                       },
                       width: '100%',
                       height: '100%',
                       //textStyle: {color: 'blue', fontSize: "2%"}
                        pieSliceText: 'label',
                        //fontSize :"22"
                        //Default: "automatic",
                        pieSliceText: 'percentage',
                        chartArea:
                        {
                          left: "2%",
                          top: "2%",
                          bottom:"2%",
                          height: "100%",
                          width: "100%"
                        }

                      };
                      var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
                      chart.draw(data, options);


                      google.visualization.events.addListener(chart, 'select', selectHandler);

                      function selectHandler(e) {

                        //alert(data.getValue(chart.getSelection()[0].row, 0));

                        $('#Subdisputeid').text(data.getValue(chart.getSelection()[0].row, 0));

                        var selectvalue = data.getValue(chart.getSelection()[0].row, 0);

                        $.ajaxSetup({
                          headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                        });

                        $.ajax({
                          url: "{{ url('/gettypeofSubdisputereport') }}",
                          type:"POST",
                          dataType:"json",
                          async: false,
                          data: {selectvalue: selectvalue, _token: '{{csrf_token()}}'},
                          success:function(data){
                            var data1 = data;
                            console.log(data1);

                            var analytics = data1;

         //console.log(analytics);
        // alert(analytics);
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        //alert($category_name);
        function drawChart()
        {
          var data = google.visualization.arrayToDataTable(analytics);
          var options = {
                        //title: 'Indian Language Use',
                        //legend: 'none',
                       //legend.position: ['top', 'bottom'],
                       // animation:
                       // {
                       //   duration: 1000,
                       //   easing: 'in',
                       // },
                       width: '100%',
                       height: '100%',
                        //legend:'none',
                        pieSliceText: 'label',
                        pieSliceText: 'percentage',
                        chartArea:
                        {
                          left: "10%",
                          top: "10%",
                          bottom : "10%",
                          height: "100%",
                          width: "100%"
                        }

                      };
                      var chart = new google.visualization.PieChart(document.getElementById('pie_chart1'));
                      chart.draw(data, options);


                      //google.visualization.events.addListener(chart, 'select', selectHandler);

                      function selectHandler(e) {
                       //alert(data.getValue(chart.getSelection()[0].row, 0));
                     }
                   }



                          },

                          error:function(data){
                            console.log(data);
                          }
                        });


                       //alert(selectvalue);
                     }
                   }
                 });

               </script>
             </div>
           </div>
         </div>

        <!--  <div class="col-lg-6">

            <div class="panel-heading">
              <h3 class="panel-title">Types Of SubDispute :</h3>
              <h3 id="Subdisputeid" class="panel-title" style="text-align: center;margin-bottom: 22px;"></h3>
            </div>
            <div class="panel-body">
              <div id="pie_chart1" style="width:100%; height:450px;">
                <script type="text/javascript">
                 $(document).ready(function() {


                  
                 });

               </script>
             </div>
           </div>
         </div> -->
</div>


         </div>
       </div>
     </div>
   </div>
   <!-- /.container-fluid -->  
 </div>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 90px;"></div>
  </body>
</html>
      
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


