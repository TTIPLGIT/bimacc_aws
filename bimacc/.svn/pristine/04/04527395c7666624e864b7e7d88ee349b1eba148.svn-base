@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="container">
  <div class="row">
    <nav class="tabs">
      <div class="selector"></div>
      <a href="#" class="active" rel="idclaimantinformation" id="tabclaimantinformation" onclick="idclaimantinformation()" ><i class="fas fa-info"></i>Claimant Information</a>
      <a href="#" rel="idresponantinformation" id="tabrespondantinformation" onclick="idresponantinformation()"><i class="fas fa-info"></i>Respondant Information</a>
      <a href="#" rel="idclaiminformation" id="tabclaiminformation" onclick="idclaiminformation()"><i class="fas fa-info"></i>Nature of Dispute</a>
      <a href="#" rel="idreliefrequest" id="tabreliefrequest" onclick="idreliefrequest()"><i class="fas fa-retweet"></i>Relief Requested</a>
      <a href="#" rel="idfees" id="tabfees" onclick="idfees()"><i class="fas fa-receipt"></i>Fees Structure</a>
    </nav>
  </div>
</div>
  <div class="tab-slider--container">

    <div id="idclaimantinformation" class="tab-slider--body">
      <div class="col-lg-12">
       <div class="card shadow mb-4">
       <!--  <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Respondant Information</h6>
        </div> -->
        <div class="card-body">
          <div class="row">
           <div class="col-lg-12 margin-tb">                    
            <div class="pull-right">
              
            </div>

          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
           <thead class="thead-light">
            <tr>
              <th>Sl. No.</th>
              <th>Claimant Name</th>
              <th>Phone No</th>
              <th>Email Address</th>
              <th>Claimant Type</th>
              <th width="230px">Action</th>                   
            </tr>
          </thead>
          
          <tbody>
            @foreach ($claimantinformations as $claimantinformation)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{ $claimantinformation->name }}</td>
              <td>{{ $claimantinformation->daytimetelephone }}</td>
              <td>{{ $claimantinformation->email }}</td>
              <td>{{ $claimantinformation->claimant_type }}</td>
              <td>
                <form action="{{ route('claimantinformation.destroy',$claimantinformation->id) }}" method="POST">
                  <a class="btn btn-primary"  data-toggle="modal" data-target="#editclaimantinformationModal"><i class="fas fa-pencil-alt"></i></a>
                </form>
              </td> 
            </tr>  
            @endforeach              
          </tbody>
          
        </table>
        @if($claimantinformations !=null)
        @include('modals/editClaimInformModal')
        @endif
       
      </div>
    </div>
  </div>

  <div class="tab-slider--container">
    <div id="idresponantinformation" class="tab-slider--body">
      <div class="col-lg-12">
       <div class="card shadow mb-4">
       <!--  <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Respondant Information</h6>
        </div> -->
        <div class="card-body">
          <div class="row">
           <div class="col-lg-12 margin-tb">                    
            <div class="pull-right">
              <a class="btn btn-success float-right" title="create" data-toggle="modal" data-target="#createrespinformModal" ><i class="fas fa-plus" ></i></a>
            </div>

          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered"  width="100%" cellspacing="0">
           <thead class="thead-light">
            <tr>
              <th>Sl. No.</th>
              <th>Respondant Name</th>
              <th>Phone No</th>
              <th>Email Address</th>
              <th>Respondant Type</th>
              <th width="230px">Action</th>                   
            </tr>
          </thead>
          
          <tbody>
            @foreach ($respondantinformations as $respondantinformation)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{ $respondantinformation->name }}</td>
              <td>{{ $respondantinformation->daytimetelephone }}</td>
              <td>{{ $respondantinformation->email }}</td>
              <td>{{ $respondantinformation->respondant_type }}</td>
              <td>
                <form action="{{ route('respondantinformation.destroy',$respondantinformation->id) }}" method="POST">
                  <a class="btn btn-primary"  data-toggle="modal" data-target="#editrespondantinformationModal"><i class="fas fa-pencil-alt"></i></a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return myFunction();" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                </form>
              </td>
            </tr>  
            @endforeach              
          </tbody>
          
        </table>
        @if($respondantinformations !=null)
        @include('modals/editrespinformModal')
        @endif

        @include('modals/createrespinformModal')
      </div>

    </div>
  </div>

  <div class="tab-slider--container">
    <div id="idclaiminformation" class="tab-slider--body">
      <div class="col-lg-12">
       <div class="card shadow mb-4">
         <!--  <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Claim Information</h6>
          </div> -->
          <div class="card-body">
            <div class="row">
             <div class="col-lg-12 margin-tb">                    
              <div class="pull-right">
                <a class="btn btn-success float-right" title="create"  data-toggle="modal" data-target="#idclaiminformationdetails" ><i class="fas fa-plus" ></i></a>
              </div>

            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead class="thead-light">
              <tr>
                <th>Sl. No.</th>
                <th>Account Name</th>
                <th>Account Type</th>
                <th>Branch Name</th>
                <th>Account Opened Date</th>
                <th>Name of the Registered Representative</th>
                <th>Dispute Category</th>
                <th>Dispute Sub Category</th>
                <th width="230px">Action</th>                   
              </tr>
            </thead>

            <tbody>
              @foreach ($ClaimDetails as $claimDetail)
              <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $claimDetail->account_name }}</td>
                <td>{{ $claimDetail->type_account }}</td>
                <td>{{ $claimDetail->name_of_the_branch }}</td>
                <td>{{ $claimDetail->date_of_account_opened }}</td>
                <td>{{ $claimDetail->name_of_the_registered_representative }}</td>
                <td>{{ $claimDetail->dispute_categories_id }}</td>
                <td>{{ $claimDetail->dispute_subcategories_id }}</td>
                <td>
                 <form action="{{ route('claimdetails.destroy',$claimDetail->id) }}" method="POST">
                  <a class="btn btn-primary"  data-target="#editClaimantDetailsModal"><i class="fas fa-pencil-alt"></i></a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return myFunction();" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                </form>
              </td>
            </tr>  
            @endforeach              
          </tbody>
        </table>
        @if($ClaimDetails != null)
        @include('modals/editClaimantDetailsModal') 
        @endif
        @include('modals/createClaimantDetailsModal') 
      </div>      
    </div>
  </div>
</div>

<div class="tab-slider--container">

  <div id="idreliefrequest" class="tab-slider--body">
    <div class="col-lg-12">
     <div class="card shadow mb-4">
     <!--  <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Relief Request</h6>
      </div> -->
      <div class="card-body">
        <div class="row">
         <div class="col-lg-12 margin-tb">                    
          <div class="pull-right">
            <a class="btn btn-success float-right" title="create"  data-toggle="modal" data-target="#idReliefRequestdetails" ><i class="fas fa-plus" ></i></a>
          </div>

        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead class="thead-light">
          <tr>
            <th>Sl. No.</th>
            <th>Actual Damage Request</th>
            <th>Punitive Damage Request</th>
            <th>Dispute Amount</th>
            <th>Specific Performance</th>
            <th>Injuctive Relief</th>
            <th>Form Fees</th>
            <th>Witness Production Fees</th>
            <th>Attorney Fees</th>
            <th>Othercase Related Fees</th>
            <th width="230px">Action</th>                   
          </tr>
        </thead>   

        <tbody>
          @foreach ($ReliefRequests as $ReliefRequest)
          <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $ReliefRequest->actual_damage_request }}</td>
            <td>{{ $ReliefRequest->punitive_damage_request }}</td>
            <td>{{ $ReliefRequest->amount_in_dispute }}</td>
            <td>{{ $ReliefRequest->specific_performance }}</td>
            <td>{{ $ReliefRequest->injuctive_relief }}</td>
            <td>{{ $ReliefRequest->form_fees }}</td>
            <td>{{ $ReliefRequest->witness_production_fees }}</td>
            <td>{{ $ReliefRequest->attorney_fees }}</td>
            <td>{{ $ReliefRequest->othercase_related_fees }}</td>
            <td>
              <form action="{{ route('reliefrequest.destroy',$ReliefRequest->id) }}" method="POST">
                <a class="btn btn-primary" data-toggle="modal" data-target="#editidReliefrequest"><i class="fas fa-pencil-alt"></i></a>
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return myFunction();" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
              </form>
            </td>
          </tr>  
          @endforeach              
        </tbody>
      </table>
      @include('modals/createReliefRequestModal') 
      @if($ReliefRequests !=null)
      @include('modals/editReliefRequestModal') 
      @endif
    </div>      
  </div>
</div>
</div>
</div>

</div>



<div class="tab-slider--container">

 <div id="idfees" class="tab-slider--body">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body"> 
        <form  action="{{ route('claimfees.store') }}" method="POST">
          @csrf  
          <div class="row register-form">
            <div class="col-md-6">
              <div class="form-group">
               <select class="form-control" name="dispute_categories_id">
                <option value="">Select Main Dispute Category</option>
                @foreach ($dispute_categories as $category)
                <option value="{{ $category->id }}"> {{$category->category_name}}</option>
                @endforeach
              </select> 
            </div>
            <div class="form-group">
             <select class="form-control" name="dispute_subcategories_id">
              <option value="">Select Dispute Sub Category</option>
              @foreach ($dispute_subcategories as $category)
              <option value="{{ $category->id }}"> {{$category->subcategory_name}}</option>
              @endforeach
            </select>
          </div>


        </div>  
        <div class="col-md-6">
         <div class="form-group">
           <input type="number" id="claim_amount" class="form-control{{ $errors->has('claim_amount') ? ' is-invalid' : '' }}" name="claim_amount" required>
           <label class="form-control-placeholder" for="claim_amount">Claim Amount</label>
           @if ($errors->has('claim_amount'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('claim_amount') }}</strong>
          </span>
          @endif
        </div>

        <div class="form-group">
          <input type="text" id="claim_amount_purpose" class="form-control{{ $errors->has('claim_amount_purpose') ? ' is-invalid' : '' }}" name="claim_amount_purpose" required>
          <label class="form-control-placeholder" for="claim_amount_purpose">Claim Amount Purpose</label>
          @if ($errors->has('claim_amount_purpose'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('claim_amount_purpose') }}</strong>
          </span>
          @endif
        </div>
      </div>  
    </div>
  </div>                   
  <div class="modal-footer">
    <div class="mx-auto">
     <button type="submit" class="btn btn-success btn-space">Save</button>
     <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
     <a class="btn btn-danger btn-space" href="{{ route('claimnotice.create') }}">Cancel</a>
   </div> 
 </div>
</div>          
</form>
</div>
</div>
</div>

</div> 
</div>
</div>  
<script type="text/javascript">
  var tabs = $('.tabs');
  var selector = $('.tabs').find('a').length;
//var selector = $(".tabs").find(".selector");
var activeItem = tabs.find('.active');
var activeWidth = activeItem.innerWidth();
$(".selector").css({
  "left": activeItem.position.left + "px", 
  "width": activeWidth + "px"
});

$(".tabs").on("click","a",function(e){
  e.preventDefault();
  $('.tabs a').removeClass("active");
  $(this).addClass('active');
  var activeWidth = $(this).innerWidth();
  var itemPos = $(this).position();
  $(".selector").css({
    "left":itemPos.left + "px", 
    "width": activeWidth + "px"
  });
});

function idclaimantinformation()
{
  document.getElementById("idclaimantinformation").style.display="block";
  document.getElementById("idresponantinformation").style.display="none";
  document.getElementById("idclaiminformation").style.display="none";
  document.getElementById("idreliefrequest").style.display="none";
  document.getElementById("idfees").style.display="none";
}
function idresponantinformation()
{
  //alert("1");
  document.getElementById("idclaimantinformation").style.display="none";
  document.getElementById("idresponantinformation").style.display="block";
  document.getElementById("idclaiminformation").style.display="none";
  document.getElementById("idreliefrequest").style.display="none";
  document.getElementById("idfees").style.display="none" ;
}

function idclaiminformation()
{
  //alert("2");
  document.getElementById("idclaimantinformation").style.display="none";
  document.getElementById("idresponantinformation").style.display="none";
  document.getElementById("idclaiminformation").style.display="block";
  document.getElementById("idreliefrequest").style.display="none";
  document.getElementById("idfees").style.display="none" ;
}

function idreliefrequest()
{
  //alert("3");
  document.getElementById("idclaimantinformation").style.display="none";
  document.getElementById("idresponantinformation").style.display="none";
  document.getElementById("idclaiminformation").style.display="none";
  document.getElementById("idreliefrequest").style.display="block";
  document.getElementById("idfees").style.display="none" ;
}

function idfees()
{
 // alert("4");
 document.getElementById("idclaimantinformation").style.display="none";
 document.getElementById("idresponantinformation").style.display="none";
 document.getElementById("idclaiminformation").style.display="none";
 document.getElementById("idreliefrequest").style.display="none";
 document.getElementById("idfees").style.display="block" ;
}
</script>
@endsection

