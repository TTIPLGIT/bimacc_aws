@foreach ($claimantslist as $claimants)

<div class="modal fade" id="showClaimantslistModal{{$claimants->id}}" tabindex="-1" role="dialog" aria-labelledby="showClaimentslistlabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
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
    <div class="modal-header">
      <h5 class="modal-title" id="showClaimentslistlabel">Show Claim Notice With Claimants</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">       
      <div class="row register-form">
        <!-- <div class="col-md-6">
          <div class="form-group">
           <strong>Organization Name : </strong>
           {{ $claimants->organization_name }}
         </div>
       </div> -->
       <div class="col-md-6">
         <div class="form-group">
           <strong>Claimant Name : </strong>
           {{ $claimants->username }}
         </div>
       </div>
       <div class="col-md-6">
       <div class="form-group">
        <strong>Claimant Phone : </strong>
        {{ $claimants->phone }}  
      </div>
    </div>
    <div class="col-md-6">
            <div class="form-group">
          <strong>Email : </strong>
          {{ $claimants->email }}  
        </div> 
        
      </div> 

     
    <div class="col-md-6">
        <div class="form-group">
         <strong>Registration Date : </strong>
        {{ $claimants->created_at }}
       </div>
                          
    </div>

    <div class="col-md-6">
        <div class="form-group">
         <strong>Address : </strong>
        {{ $claimants->address }}
       </div>                          
    </div>                


  </div>
  <div class="modal-footer">
    <div class="mx-auto"> 
          
      <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">Close</span>
      </button>                 
     
   </div>
 </div> 
</div>             
</div>
</div>
</div>
</div>
@endforeach







