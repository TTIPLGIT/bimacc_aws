<!-- Create Climant Information Modal-->

<div class="modal fade" id="createClaimInformationModal" tabindex="-1" role="dialog" aria-labelledby="claiminformationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="claiminformationModalLabel">Create Claimant Information</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
        <form  action="{{ route('claimantinformation.store') }}" method="POST">
          @csrf  
          <div class="row register-form">
            <div class="col-md-6">
              <div class="form-group">

                <input type="text" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required>
                <label class="form-control-placeholder" for="name">Name</label>
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
               <input type="text" id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required>
               <label class="form-control-placeholder" for="address">Address</label>
               @if ($errors->has('address'))
               <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('address') }}</strong>
              </span>
              @endif            
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">

              <input type="text" id="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" required>
              <label class="form-control-placeholder" for="country">Country</label>
              @if ($errors->has('country'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('country') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
             <input type="text" id="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" required>
             <label class="form-control-placeholder" for="state">State</label>
             @if ($errors->has('state'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('state') }}</strong>
            </span>
            @endif   
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">

            <input type="text" id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" required>
            <label class="form-control-placeholder" for="state">City</label>
            @if ($errors->has('city'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('city') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">

           <input type="text" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required>
           <label class="form-control-placeholder" for="state">Email</label>
           @if ($errors->has('email'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
         <input type="text" id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" required>
         <label class="form-control-placeholder" for="state">Contact</label>
         @if ($errors->has('phone'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('phone') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <select name="claimant_type" class="form-control">
          <option value="">Select Main Dispute Category</option>
          <option value="public customer" selected="selected">Public Customer</option>
          <option value="broker dealer">Broker Dealer</option>
          <option value="person associated with broker">Person Associated with Nroker</option>
        </select>  
                              
      </div>
    </div>

  </div> 
</div>                   
<div class="modal-footer">
  <div class="mx-auto">
    <button type="submit" class="btn btn-success btn-space"  onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();">Save & Next</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
     <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
         Close
        </button>
  </div> 
</div>
</div>          
</form>
</div>
</div>
</div> 
</div>
    <!-- End Of Climant Information Modal -->