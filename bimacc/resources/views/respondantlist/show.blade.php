@foreach ($respondantLists as $respondantList)

<div class="modal fade" id="showRespondantlistModal{{$respondantList->id}}" tabindex="-1" role="dialog" aria-labelledby="showRespondantlistlabel" aria-hidden="true">
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
      <h5 class="modal-title" id="showRespondantlistlabel">Show Respondant Details</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">       


      <div class="row register-form">
        <div class="col-md-6">
          <div class="form-group">
           <strong>Claimant Name : </strong>
           {{ $respondantList->username }}
         </div>
       </div>

       
      <div class="col-md-6">
         <div class="form-group">
           <strong>Respondant Name : </strong>
           {{ $respondantList->firstname }}
         </div>
       </div>
       <div class="col-md-6">
       <div class="form-group">
        <strong>Respondant Contact : </strong>
        {{ $respondantList->daytimetelephone }}  
      </div>
    </div>
      <div class="col-md-6">
        <div class="form-group">
          <strong>Email : </strong>
          {{ $respondantList->email }}  
        </div> 
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <strong>ClaimNotice No : </strong>
          {{ $respondantList->claimnoticeno }}  
        </div> 
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <strong>Address : </strong>
          {{ $respondantList->address }}  
        </div> 
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







