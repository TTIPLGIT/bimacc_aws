<!DOCTYPE html>
<html>
<head>
    <title>Arbitration</title>
     <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function() {      
        $.viewMap = {
          '0' : $([]),
          'domestic' : $('#domestic'),
          'international' : $('#international')
        };

        $('#viewSelector').change(function() {
          // hide all
          $.each($.viewMap, function() { this.hide(); });
          // show current
          $.viewMap[$(this).val()].show();
        }).change();
      });
    </script> 
    <script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>
   <script type="text/javascript">
            $(function () {
                $('#datetimepicker').datepicker({
                  format: 'yy-mm-dd',
                });

            });
    </script>
 
</head>
<body>
  
<div class="container">
    @yield('content')
</div>
   
</body>
</html>