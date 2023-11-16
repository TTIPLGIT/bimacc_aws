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
          <h3 class="panel-title" style="text-align: center;margin-bottom: 22px;color: black;">Registeration Fee</h3>
        </div>
        <div class="panel-body">
          <div id="chart_div" style="width:80%; height:350px;margin-left: 80px;">
            <script type="text/javascript">
             $(document).ready(function() {
               $(".potable").hide();
               $(".potables").hide();

            var selectyear = $('#year').val();
            //alert(selectyear);

           $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

           $.ajax({
            url: "{{ url('/yearwisereport') }}",
            type:"POST",
            dataType:"json",
            async: false,
            data: {selectyear: selectyear, _token: '{{csrf_token()}}'},
            success:function(data){
              $(".potable").hide();
               $(".potables").hide();
              var datavalue = data;
              console.log(datavalue);

              //alert(data1[0]);

              var analytics = datavalue[0];

             //alert(analytics);
         google.charts.load('current', {packages: ['corechart']});
         google.charts.setOnLoadCallback(drawBasic);
        //alert($monthstring);

        var monthstring = $('#monthstring').val();

        function drawBasic() {

          var data = new google.visualization.DataTable();
          data.addColumn('string', '');
          data.addColumn('number', 'Revenue');

          data.addRows(analytics);

          var options = {
            // chartArea:
            //             {
            //              height: "50%",
            //               width: "50%"
            //             },
            legend: 'none',
          //title: 'Current Year - Month Recovery(INR)',
          hAxis: {
            title: 'Months',
            viewWindow: {
              min: [7, 30, 0],
              max: [17, 30, 0]
            }
          },
          vAxis: {
            title: 'INR', 
            format: '₹ ',
            viewWindow: {
              min: 0.01,
              max: 15000
            }
          }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);

        google.visualization.events.addListener(chart, 'select', selectHandler);

        function selectHandler(e) {
           //alert('A table row was Registeration Fee');
           //alert(data.getValue(chart.getSelection()[0].row, 0));

           $('#registrationfeemonth').text(data.getValue(chart.getSelection()[0].row, 0));

           var selectvalue = data.getValue(chart.getSelection()[0].row, 0);

           $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

           $.ajax({
            url: "{{ url('/registrationfeesreport') }}",
            type:"POST",
            dataType:"json",
            async: false,
            data: {selectvalue: selectvalue, _token: '{{csrf_token()}}'},
            success:function(data){

              //alert(data);
              $("#regfees").html(data.html);

              $(".potable").show();
              $(".potables").hide();
              var data1 = data;
              console.log(data1);

            },

            error:function(data){
              //alert(data);
              console.log(data);
            }
          });


         }
       }

        var second = datavalue[1];

            secondchart(second);
            },

            error:function(data){
              console.log(data);
            }
          });



         });

function secondchart(data){

            var analytics1 = data;

          //alert(analytics1);
        
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawBasic);
        //alert(analytics1);

       

        var month = $('#monthstrings').val();

        function drawBasic() {

          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Time of Day');
          data.addColumn('number', 'Revenue');

          data.addRows(analytics1);

          var options = {legend: 'none',
          //title: 'Current Year - Month Recovery(INR)',
          hAxis: {
            title: 'Months',

            viewWindow: {
              min: [7, 30, 0],
              max: [17, 30, 0]
            }
          },
          vAxis: {
           title: 'INR',
           format: '₹ ',
           viewWindow: {
            min: 0.01,
            max: 15000
          }
        }
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
      chart.draw(data, options);

      google.visualization.events.addListener(chart, 'select', selectHandler1);

      function selectHandler1(e) {
         //alert('A table row was Admin Fee and Arbitrator Fee');
           //alert(data.getValue(chart.getSelection()[0].row, 0));

           $('#adminandarbitratorfeemonth').text(data.getValue(chart.getSelection()[0].row, 0));

           var selectvalue = data.getValue(chart.getSelection()[0].row, 0);

           $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

           $.ajax({
            url: "{{ url('/adminandarbitratorfeesreport') }}",
            type:"POST",
            dataType:"json",
            async: false,
            data: {selectvalue: selectvalue, _token: '{{csrf_token()}}'},
            success:function(data){
              $(".potable").hide();
              $(".potables").show();
              var data1 = data;
              console.log(data1);

               $("#AdminandArbitratorfees").html(data.html);


            },

            error:function(data){
              console.log(data);
            }
          });
      }
    }

}

   </script>
 </div>
</div>
</div>
        <div class="form-group" style="margin-right: -76px;margin-top: -10px;position: absolute;">
          <label class="form-control-placeholder" for="year" style="position: initial;">Year<span style="color: red"></span></label>
          <select id='year' class="" name="dispute_categories_id" >
            <option value="2021" selected>2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
          </select>   
        </div>
<div class="col-lg-6">
  <div class="panel-heading">
    <h3 class="panel-title" style="text-align: center;margin-bottom: 22px;color: black;">Admin Fee and Arbitrator Fee</h3>
    <h3 id="Subdisputeid" class="panel-title" ></h3>
  </div>
  <div class="panel-body">
    <div id="chart_div1" style="width:80%; height:350px; margin-left: 80px;">
      <script type="text/javascript">
      </script>
</div>
</div>
</div>


 

</div>
</div>
</div>
</div>
<!-- /.container-fluid -->  
</div>
</head>
<body>
<div class="potable" style="margin-top: 25px;" id="regfees"></div>
</div>
<div class="potables" style="margin-top: 25px;" id="AdminandArbitratorfees"></div>
</div>
</body>
</html>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
  $(function() {
    $("#year").change(function() {
   var selectyear = $('option:selected', this).text();

            //alert(selectyear);

           $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

           $.ajax({
            url: "{{ url('/yearwisereport') }}",
            type:"POST",
            dataType:"json",
            async: false,
            data: {selectyear: selectyear, _token: '{{csrf_token()}}'},
            success:function(data){
               $(".potable").hide();
               $(".potables").hide();
              var datavalue = data;
              console.log(datavalue);

              //alert(data1[0]);

              var analytics = datavalue[0];

              //alert(analytics);

         google.charts.load('current', {packages: ['corechart']});
         google.charts.setOnLoadCallback(drawBasic);
        //alert($monthstring);

        var monthstring = $('#monthstring').val();

        function drawBasic() {

          var data = new google.visualization.DataTable();
          data.addColumn('string', '');
          data.addColumn('number', 'Revenue');

          data.addRows(analytics);

          var options = {
            // chartArea:
            //             {
            //              height: "50%",
            //               width: "50%"
            //             },
            legend: 'none',
          //title: 'Current Year - Month Recovery(INR)',
          hAxis: {
            title: 'Months',
            viewWindow: {
              min: [7, 30, 0],
              max: [17, 30, 0]
            }
          },
          vAxis: {
            title: 'INR', 
            format: '₹ ',
            viewWindow: {
              min: 0.01,
              max: 15000
            }
          }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);

        google.visualization.events.addListener(chart, 'select', selectHandler);

        function selectHandler(e) {
           //alert('A table row was Registeration Fee');
           //alert(data.getValue(chart.getSelection()[0].row, 0));

           $('#registrationfeemonth').text(data.getValue(chart.getSelection()[0].row, 0));

           var selectvalue = data.getValue(chart.getSelection()[0].row, 0);

           $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

           $.ajax({
            url: "{{ url('/registrationfeesreport') }}",
            type:"POST",
            dataType:"json",
            async: false,
            data: {selectvalue: selectvalue, _token: '{{csrf_token()}}'},
            success:function(data){

              $("#regfees").html(data.html);

              $(".potable").show();
              $(".potables").hide();
              var data1 = data;
              console.log(data1);

              // var analytics = data1;

              // var html = '<tr>'; 

              // for(var count = 0; count < analytics.length; count++)
              // {

              //   var text = parseInt(count) + 1;

              //   var ClaimantName  = analytics[count].name;

              //   var RespondentName = analytics[count].firstname;

              //   var claimnoticeid = analytics[count].claimnoticeno;

              //   var Invoiceno = analytics[count].invoiceno;

              //   var invoiceamt = analytics[count].invoiceamount;   

              //   html += '<td>'+text+'</td> ';

              //   html += '<td>'+ClaimantName+'</td>';

              //   html += '<td>'+RespondentName+'</td>';

              //   html += '<td>'+claimnoticeid+'</td> ';

              //   html += '<td>'+Invoiceno+'</td>';

              //   html += '<td>'+invoiceamt+'</td></tr>';
 
 
              // }
              // $('tbody').html(html);

            },

            error:function(data){
              console.log(data);
            }
          });


         }
       }

        var second = datavalue[1];

            secondchart(second);
            },

            error:function(data){
              console.log(data);
            }
          });

    });
});
</script>



