
@extends('layouts.admin')
@section('content')
@foreach ($claimantslist as $claimants)
<div class="container con"> 
 <div class="row">
   <div class="col-lg-12 margin-tb" style="    text-align: center;
   color: black;
   font-weight: 900;
   font-size: 24px;
   text-decoration: underline;">                    
   <b>{{$claimants->organization_name}} </b>
 </div>
</div>

<div class="modal-content">
  <div class="modal-body">       
   <div class="row register-form">
    <div class="col-md-6">
      <div class="form-group">
       <strong>Organization Name : </strong>
       {{ $claimants->organization_name }}
     </div>
     <div class="form-group">
       <strong>Claimant Name : </strong>
       {{ $claimants->username }}
     </div>
     <div class="form-group">
      <strong>Claimant Phone : </strong>
      {{ $claimants->phone }}  
    </div>

    <div class="form-group">
      <strong>Email : </strong>
      {{ $claimants->email }}  
    </div> 

  </div> 

  <div class="col-md-6">
    <div class="form-group">
     <strong>Created Date : </strong>
    {{ $claimants->created_at }}
   </div>

 </div>                
</div>
</div>
</div>
@endforeach
@endsection
