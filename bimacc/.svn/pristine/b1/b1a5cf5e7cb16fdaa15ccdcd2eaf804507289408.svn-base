@extends('layouts.admin')
@section('content')
<style>
  #frname{
    color: red;
  }
</style>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<div class="container con"> 
  <div class="row">
   <div class="col-lg-12 margin-tb">                    

   </div>
 </div>
 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Create Video Hearing Link</h6>
  </div>

  <div class="card-body">
    <div class="table-responsive" style="overflow-x: hidden;">

      <form  action="{{ route('videoconferencing.store') }}" method="POST" id="videoconferencing_form">
        @csrf 
        <div class="row register-form">

          <div class="col-md-4">
            <div class="form-group">
              <label >Claim Petition No. <span style="color: red">*</span></label>
              <select class="col-xs-12 col-sm-12 col-md-12 form-control" id="claim_notice_id" name="claim_notice_id">
                <option value="">Select Claim Petition No.</option>
                @foreach ($claimnotice as $notice)
                <!-- <option value="{{ $notice->id }}"> {{$notice->claimnoticeno}} ::{{$notice->arbitration_petionno}} </option> -->
                <option value="{{ $notice->id }}">{{$notice->arbitration_petionno}} </option>
                @endforeach
              </select>

            </div>
          </div>

             <div class="col-md-4">
            <div class="form-group">
              <label >Stage Description<span style="color: red">*</span></label>
              <input type="text" id="video_conferencing_header" class="form-control{{ $errors->has('video_conferencing_header') ? ' is-invalid' : '' }}" name="video_conferencing_header" required id="video_conferencing_header" style="pointer-events: none;" >

            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label >Email Addresses<span style="color: red">*</span></label>
              <select class="col-xs-12 col-sm-12 col-md-12 form-control" id="mail_id" name="mail_id[]" multiple style="pointer-events: none;">
                <option value="" selected>Select Email Addresses<span style="color: red">*</span></option>
              </select>
            </div>
          </div>
        <div class="col-md-4">
            <div class="form-group">
              <label >Video Conference Link<span style="color: red">*</span></label>
              <input type="text" id="link" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" required id="link">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label >Meeting ID<span style="color: red">*</span></label>
              <input type="text" id="meeting_id" class="form-control{{ $errors->has('meeting_id') ? ' is-invalid' : '' }}" name="meeting_id" required id="meeting_id">
            </div>
          </div>


          <div class="col-md-4">
            <div class="form-group">
              <label >Meeting Passcode<span style="color: red">*</span></label>
              <input type="text" id="meeting_passcode" class="form-control{{ $errors->has('meeting_passcode') ? ' is-invalid' : '' }}" name="meeting_passcode" required id="meeting_passcode" maxlength="10">
            </div>
          </div>


          <div class="col-md-4">
            <div class="form-group">
              <label >Start Date and Time<span style="color: red">*</span></label>
     

              <input type="datetime-local" id="start_date" class="timecheck form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" required id="start_date" >
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label >End Date and Time<span style="color: red">*</span></label>
              <input type="time" id="end_date" class="timecheck form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" required id="end_date" >
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="mx-auto">
            <button type="button" class="btn btn-success btn-space" onclick="videoconferencingbuttonclick()" id="videoconferencingbutton">Send Invitation Link</button>
            <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
            <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">Cancel</span>
            </button>             
          </div>
        </div> 
      </form>  
    </div>
  </div>            
</div>
</div>


<!-- <script>

 $('#insurance1').find(".datechk").datetimepicker({ dateFormat: 'yy-mm-dd' }); 
</script> -->
<!-- <script type="text/javascript">
  var dateClass='.datetimecheck';
$(document).ready(function ()
{
  if (document.querySelector(dateClass).type !== 'datetime-local')
  {
    var oCSS = document.createElement('link');
    oCSS.type='text/css'; oCSS.rel='stylesheet';
    oCSS.href='//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css';
    oCSS.onload=function()
    {
      var oJS = document.createElement('script');
      oJS.type='text/javascript';
      oJS.src='//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js';
      oJS.onload=function()
      {
        $(dateClass).datetimepicker({ format:'Y-m-d H:i'});
      }
      document.body.appendChild(oJS);
    }
    document.body.appendChild(oCSS);
  }
});

  

</script> -->

<script>
  function videoconferencingbuttonclick() {

    var claim_notice_id =  $('#claim_notice_id').val();
    if (claim_notice_id =='') 
    {
     swal("Please Select the Claim Notice ", "", "error");
     return false;
   }
   var mail_id =  $('#mail_id').val();
   if (mail_id =='') 
   {
     swal("Please Select Mail Id ", "", "error");
     return false;
   }
   var video_conferencing_header =  $('#video_conferencing_header').val();
   if (video_conferencing_header =='') 
   {
     swal("Enter Video Conference Name ", "", "error");
     return false;
   }

    var link =  $('#link').val();
   if (link =='') 
   {
     swal("Video Conference Link ", "", "error");
     return false;
   }

   var meeting_id =  $('#meeting_id').val();
   if (meeting_id =='') 
   {
     swal("Enter Meeting ID ", "", "error");
     return false;
   }

   var meeting_passcode =  $('#meeting_passcode').val();
   if (meeting_passcode =='') 
   {
     swal("Enter Meeting Passcode ", "", "error");
     return false;
   }


   var start_date =  $('#start_date').val();
   if (start_date =='') 
   {
     swal("Enter Start Date ", "", "error");
     return false;
   }


    //  var tracking_date = $('#tracking_date').val();
    var inputDate = new Date(start_date);

// Get today's date
    var todaysDate = new Date();

      // call setHours to take the time out of the comparison
      if(inputDate.setHours(0,0,0,0) < todaysDate.setHours(0,0,0,0)) {
       swal("Past Date should not be allowed", "", "error");

       return false;
     }

     var end_date =  $('#end_date').val();
     if (end_date =='') 
     {
       swal("Enter End Date ", "", "error");
       return false;
     }

     var inputDate = new Date(end_date);

      // Get today's date
      var todaysDate = new Date();

      // call setHours to take the time out of the comparison
      if(inputDate.setHours(0,0,0,0) < todaysDate.setHours(0,0,0,0)) {
       swal("Past Date should not be allowed", "", "error");

       return false;
     }


     $("#videoconferencingbutton").attr("disabled", true);
     document.getElementById('videoconferencing_form').submit();
     swal("Video Conferencing Link Sent Successfully ", "", "success");
   }
 </script>
 <script type="text/javascript">
  $(document).on('change', '#claim_notice_id', function()
  {
    var claim_notice_id = $('#claim_notice_id').val();

    $.ajax({
      url: '{{ url('/videoconferencing/getlateststage') }}' + '/' + claim_notice_id,    
      method:'GET',  
      success:function(success){

        console.log(success)
        document.getElementById('video_conferencing_header').value =success[0].claimantnotice_stage_description 
      },
      error:function(){
      }
    });
    

    $.ajax({
      url: '{{ url('/videoconferencing/getemail') }}' + '/' + claim_notice_id,    
      method:'GET',  
      success:function(data){
        console.log(data);        
        $('#mail_id').empty();
        $('#mail_id').append('');
        
        for(var count = 0; count < data.length; count++)
        {
          $('#mail_id').append('<option value = "'+data[count].id+'" selected >'+ data[count].email +' </option>');  
          // $("#mail_id").attr("disabled", "disabled");
        } 

      },
      error:function(){


      }
    });


    

  });
</script>

<script>

  $(document).on('change', '#start_date', function(){

    var startDate = document.getElementById("start_date").value;
    var endDate = document.getElementById("end_date").value;

    if (endDate =='') 
    {

    }
    else
    {
     var start_date = new Date(startDate); 
     var end_date = new Date(endDate); 
     var Difference_In_Time = end_date.getTime() - start_date.getTime(); 
     var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24) + 1; 

     if (Difference_In_Days <= 0) 
     {
       swal("Invalid Start Date", "", "error");
       document.getElementById("start_date").value = "";
       return false;
     }
   }

 });
  $(document).on('change', '#end_date', function(){

    var startDate = document.getElementById("start_date").value;
    var endDate = document.getElementById("end_date").value;

    if (endDate =='')  
    {

    }
    else
    {
     var start_date = new Date(startDate); 
     var end_date = new Date(endDate); 
     var Difference_In_Time = end_date.getTime() - start_date.getTime(); 
     var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24) + 1; 

     //alert(Difference_In_Days);
     if (Difference_In_Days <= 0) 
     {
       swal("Invalid End Date", "", "error");
       document.getElementById("end_date").value = "";
       return false;
     }
   }

 });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script>
    $(function(){           
        if (!Modernizr.inputtypes.date) {
            $('input[type=date]').datepicker({
                  dateFormat : 'yy-mm-dd'
                }
             );
        }
    });
</script>
<script>


$.datetimepicker.setDateFormatter({
parseDate: function (date, format) {
var d = moment(date, format);
return d.isValid() ? d.toDate() : false;
},
formatDate: function (date, format) {
return moment(date).format(format);
},
});
$('.timecheck').datetimepicker({
changeYear: true,
changeMonth: true,
minDate: 0,
format: 'YYYY-MM-DD hh:mm',
});
</script>


<!--   <script type="text/javascript">
            $(function () {
               $('#start_date').datetimepicker({
    minDate: 0,  // disable past date
    minTime: 0, // disable past time
});
            });
        </script> -->
@endsection

