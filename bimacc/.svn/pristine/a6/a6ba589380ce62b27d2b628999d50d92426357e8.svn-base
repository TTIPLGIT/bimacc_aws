@foreach ($administrationfees as $administrationfee)
<div class="modal fade" id="showAdministrationFeesModal{{$administrationfee->id}}" tabindex="-1" role="dialog" aria-labelledby="showAdministrationFeeslabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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
      <h5 class="modal-title" id="showAdministrationFeeslabel">Show Administration Fees</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">                   

      <div class="row register-form">
        <div class="col-md-6">
          <div class="form-group">
            <strong>Administration Fees : </strong>
            {{ $administrationfee->administration_fees }}
          </div>
        </div>
        <div class="col-md-6">
         <div class="form-group">
          <strong>Administration Description : </strong>
          {{ $administrationfee->fees_description }}
        </div>
        <div class="form-group">
          <strong>Valid From : </strong>
          {{ $administrationfee->valid_from }}
        </div>

        <div class="form-group">
         <strong>Valid To : </strong>
         {{ $administrationfee->valid_to }}
       </div> 
     </div>    
   </div>                 
 </div>
 <div class="modal-footer">
  <div class="mx-auto">                    

    <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">Cancel</span>
    </button>          
  </div>
</div> 
</div>             

</div>
</div>
</div>
</div>
@endforeach






