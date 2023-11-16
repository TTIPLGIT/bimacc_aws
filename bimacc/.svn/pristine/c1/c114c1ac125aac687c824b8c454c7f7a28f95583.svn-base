@foreach ($registrationfees as $registrationfee) 
<div class="modal fade fade-scale" id="editRegistrationFeesModal{{$registrationfee->id}}" tabindex="-1" role="dialog" aria-labelledby="editRegistrationFeeslabel" aria-hidden="true">
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
        <h5 class="modal-title" id="editRegistrationFeeslabel">Edit Registration Fees</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 

        <form  action="{{ route('registrationfees.update', $registrationfee->id ) }}" method="POST"> 

          @csrf
          @method('PUT')                        

          <div class="row register-form">
          
           <div class="col-md-6">
              <div class="form-group">
               <select class="form-control" name="currency" id="currency" required>
                <option value="">Select Currency</option>                
                <option value="INR" {{ ( $registrationfee->currency == 'INR') ? 'selected' : '' }}>INR</option>
                <option value="USD" {{ ( $registrationfee->currency == 'USD') ? 'selected' : '' }}>USD</option>                
              </select>
              <label class="form-control-placeholder" for="currency">Select Currency<span style="color: red">*</span></label> 
            </div>
          </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="registration_fees" class="form-control {{ $errors->has('registration_fees') ? ' is-invalid' : '' }}" name="registration_fees" value = "{{$registrationfee->registration_fees}}" required >
                <label id="registration_fees" class="form-control-placeholder" for="registration_fees">Registration Fees<span style="color: red">*</span></label>
                @if ($errors->has('registration_fees'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('registration_fees') }}</strong>
                </span>
                @endif                                 
              </div>            
            </div> 

           <!--  <div class="col-md-6">
              <div class="form-group">
                <textarea class="form-control" name="fees_description" value = "{{$registrationfee->fees_description}}" required>{{$registrationfee->fees_description}}</textarea>               
                <label id="fees_description" class="form-control-placeholder" for="fees_description">Fees <span style="color: red">*</span></label>
                 

              </div>            
            </div> -->

            <div class="col-md-6">
              <div class="form-group">
                <label id="claim_amount_from"  for="claim_amount_from">Claim Amount From<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="claim_amount_from" value="{{$registrationfee->claim_amount_from}}" required>              


              </div>            
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label id="claim_amount_to" for="claim_amount_to" >Claim Amount To<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="claim_amount_to" value="{{$registrationfee->claim_amount_to}}" required>           </div>            
            </div>  

          </div>              


        </div>
        <div class="modal-footer">
          <div class="mx-auto">
            <button type="submit" class="btn btn-success btn-space">Save</button>                       

           <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">Cancel</span>
          </button>          
          </div>
        </div> 
      </div>             
    </form>

  </div>
</div>
</div>

</div>


@endforeach













