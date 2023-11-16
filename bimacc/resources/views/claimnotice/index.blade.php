@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div class="container con"> 
  <div class="row">
   <div class="col-lg-12 margin-tb">                    
    <div class="pull-right">
      <a class="btn btn-success float-right" title="Create" href="{{ route('claimnotice.create') }}" >Create New Claim Notice</a>
    </div>
  </div>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Claim Notice</h6>
  </div>

  <div class="card-body">
    <div class="table-responsive">
     <!--  <button onclick="createPDF('dataTable')">Export Table Data To Excel File</button> -->
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       <thead class="theadalign">
        <tr>
          <th style="width: 104.4px;">Sl. No.</th>
          <th >Claim Notice No. & Date</th>

          <th>Action</th>                       
        </tr>
      </thead>
      <tbody style="text-align:center">
       @foreach ($claimnotice as $notice)
       <tr>
        <td>{{ $loop->iteration}}</td>                    
        <!-- <td >{{ $notice->claimnoticeno }} - {{ $notice->created_at }}</td> -->
<td>
  <a href="{{ route('claimnotice.show',$notice->id) }}">
  
      {{ $notice->claimnoticeno }} - {{ $notice->created_at }}
    
  </a>
</td>

        <td> 
         <form action="{{ route('claimnotice.destroy',$notice->id) }}" method="POST">
          <!-- <a class="btn btn-info" title="show" href="{{ route('claimnotice.show',$notice->id) }}" >View</a> -->
          @if( $notice->claimnoticestatus !="New Claim")
  <!-- <a class="btn btn-primary"  data-toggle="modal" data-target="#amendclaimantmodal{{$notice->id}}" style="
  color: white;">Amend</a> -->
    
         
           @if($claimantamend[$loop->iteration-1][0]->details_count =='') 
            <a class="btn btn-primary"   data-toggle="modal"  data-target="#amendclaimantmodal{{$notice->id}}" style="
    color: white;" id="disable">Amend</a>
    @else
    <a class="btn btn-secondary" data-toggle="modal" data-target="#amendclaimantmodal{{$notice->id}}" style="
    color: white;
    pointer-events: none !important;
    " id="disable">Amend</a>
    @endif
     @endif
          @if( $notice->claimnoticestatus =="New Claim")
          <a class="btn btn-primary" title="Edit"  href="{{ route('claimnotice.edit',$notice->id)}}"  >Edit</a>  
             @csrf
          @method('DELETE') 
          <button type="submit" onclick="return myFunction();"   class="btn btn-danger">Delete</button>

          @else
          @endif  
         
        </form>
      </td>

    </tr>
    <!-- <script type="text/javascript">
     $('#claimnoticedelete{{$notice->id}}').on('click', function (event) 
   {

    event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
  title: "Are you Sure Want to Delete this?",
  // text: "But you will still be able to retrieve this file.",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#d94225",
  confirmButtonText: "Yes",
  cancelButtonText: "No",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
     document.getElementById("claimnoticedelete{{$notice->id}}").submit();
  } else {
    swal("Cancelled", "claim notice not delete :)", "error");
  }
});

});
</script> -->
    @endforeach
  </tbody>
</table>
@include('modals/amendclaimantmodal')

</div>
</div>
</div>
</div>
<!-- <style>
  .card-body{
  overflow: scroll;
}

</style>
-->

@endsection

