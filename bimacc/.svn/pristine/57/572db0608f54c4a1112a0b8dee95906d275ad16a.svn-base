
@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="container con">
  <!-- <div class="row"> 
   <div class="col-lg-12 margin-tb">                    
    <div class="pull-right">
      <a onclick="exportTableToExcel('dataTable','ClaimantList-{{now()}}')"class="btn btn-success float-right" title="Create"><i class="fa fa-download"></i> Export Excel</a>
    </div>
  </div>
</div> -->

 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Respondent Details</h6>
  </div>
  <div class="card">
               

                <div class="card-body">


                 <div class="row">
                  <div class="col-12 col-md-12 col-lg-12">

                    <form  action="{{ route('misrespondentdetails.store') }}" method="POST" name="new_entry" enctype="multipart/form-data" autocomplete="off" id="claimantinformationform">
           {{ csrf_field() }}
                    

                  <div class="card-body" id="po_header">





                    <div class="row">

                     <div class="col-md-6">
                     <div class="form-group">
                     
                      <input  class="form-control datechk" type="text"  name="from_date" id="from_date" required="true" value="<?php echo date('d-m-Y'); ?>" />
                       <label class="form-control-placeholder">From Date<span style="color: red">*</span></label>

                    </div>
                  </div>
                    <div class="col-md-6">
                     <div class="form-group">
                      
                      <input  class="form-control datechk" type="text" name="received_date" id="received_date" required="true" value="<?php echo date('d-m-Y'); ?>" />
                      <label class="form-control-placeholder">To Date<span style="color: red">*</span></label>

                    </div>
                  </div>
                </div>
               <div class="row">
           <div class="col-md-6">
              <div class="form-group">
               <select class="form-control" name="claimant_type" id="claimant_type" >
                <option value="">Respondent Type</option>
               @foreach ($claimant_type as $claimant_type)
                <option value="{{ $claimant_type->id }}" {{ $claimant_type->id ==  old('claimant_type') ? 'selected':'' }}> {{$claimant_type->claimant_respondant_type_name}}</option>
                @endforeach
              </select>
              <label class="form-control-placeholder" for="claimant_type">Respondent Type</label> 
            </div>
          </div>
<!-- <div class="col-md-6" >


 
  {!! Form::countries('country', Input::old('country'), 'form-control') !!}
 
  <label class="form-control-placeholder{{ $errors->has('country') ? ' is-invalid' : '' }}" for="country" id="country" name="country" value="{{old('country')}}"
>Country<span style="color: red">*</span></label> 

</div> -->
      

                

              </div>

             

            </div>

            <div class="card-footer text-center">
               <button type="submit" class="btn btn-success btn-space" id="claimantinformationbutton" >Get Data</button>
   

            </div>
          </form> 
        </div>

       
  
</div>

</div>
</div>
</div>
</div>
<script>

  $(document).on('change', '#from_date', function(){

    var startDate = document.getElementById("from_date").value;
    var endDate = document.getElementById("received_date").value;

    if (endDate =='') 
    {

    }
    else
    {
     var start_date = new Date(startDate); 
     var end_date = new Date(endDate); 
    

     // if (start_date <= end_date) 
     // {
     //   swal("Invalid From Date", "", "error");
     //   document.getElementById("from_date").value = "";
     //   return false;
     // }
   }

 });
  $(document).on('change', '#received_date', function(){

    var startDate = document.getElementById("from_date").value;
    var endDate = document.getElementById("received_date").value;

    if (endDate =='') 
    {

    }
    else
    {
     var start_date = new Date(startDate); 
     var end_date = new Date(endDate); 
     

      if (start_date >= end_date)  
     {
       swal("Invalid End Date", "", "error");
       document.getElementById("received_date").value = "";
       return false;
     }
   }

 });

</script>
<script type="text/javascript">
  
var fields = "#from_date, #received_date";

$(fields).on('change', function() {
    if (allFilled()) {
        $('#claimantinformationbutton').removeAttr('disabled');
    } else {
        $('#claimantinformationbutton').attr('disabled', 'disabled');
    }
});

function allFilled() {
    var filled = true;
    $(fields).each(function() {
        if ($(this).val() == '') {
            filled = false;
        }
    });
    return filled;
}
</script>
<!--  <script type="text/javascript">
        $(document).ready(function() {
            $('#claimantinformationbutton').attr("disabled", true);
        });
        </script> -->
        <script type="text/javascript">
          $('#from_date').datepicker({
   dateFormat: 'dd-mm-yy ',
  maxDate:'0',
   changeMonth: true,
changeYear: true 
});
            $('#received_date').datepicker({
    dateFormat: 'dd-mm-yy ',
  maxDate:'0',
   changeMonth: true,
changeYear: true
});
        </script>






@endsection
