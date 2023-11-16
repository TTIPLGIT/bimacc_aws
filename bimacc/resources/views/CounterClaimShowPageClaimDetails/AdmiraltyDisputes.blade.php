    <form  action="{{ route('claimdetails.store') }}" method="POST" style="    width: 100%;" >
      @csrf  
      <div class="row register-form">
        <div class="col-md-12">
          <div class="row">
           <div class="col-md-12"> 
             <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><u><b>Details of vessels/cargo/ports & Claim Amount</b></u></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"> 
            <div class="form-group">
             <input type="text" id="svesselname" class="form-control{{ $errors->has('vesselname') ? ' is-invalid' : '' }}" name="vesselname" >
             <label class="form-control-placeholder" for="vesselname">Vessel Name: *</label>
             @if ($errors->has('vesselname'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('vesselname') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
          <div class="form-group">
            <input type="text" id="scargonature" class="form-control{{ $errors->has('cargonature') ? ' is-invalid' : '' }}" name="cargonature" >
            <label class="form-control-placeholder" for="cargonature">Cargo Nature:*</label>
            @if ($errors->has('cargonature'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('cargonature') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-4"> 
         <div class="form-group">
           <input type="text" id="squantity" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" >
           <label class="form-control-placeholder" for="quantity">Quantity:*</label>
           @if ($errors->has('quantity'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('quantity') }}</strong>
          </span>
          @endif
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">  
        <div class="form-group">
         <textarea id="sinjurydetails" class="form-control{{ $errors->has('injurydetails') ? ' is-invalid' : '' }}" name="injurydetails"></textarea>
         <label class="form-control-placeholder" for="injurydetails">Sea men/ Passenger injury,Loss details:*</label>
         @if ($errors->has('injurydetails'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('injurydetails') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-6"> 
      <div class="form-group">
       <input type="text" id="sclaimamount" class="form-control{{ $errors->has('claimamount') ? ' is-invalid' : '' }}" name="claimamount" >
       <label class="form-control-placeholder" for="claimamount">Claim Amount:*</label>
       @if ($errors->has('claimamount'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('claimamount') }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>

<div class="row">
 <div class="col-md-12"> 
   <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
    <label><u><b>Date of contract/invoice</b></u></label>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-4"> 
    <div class="form-group">
     <input type="text" id="svesselname" class="form-control{{ $errors->has('vesselname') ? ' is-invalid' : '' }}" name="vesselname" >
     <label class="form-control-placeholder" for="vesselname">Date of contract: *</label>
     @if ($errors->has('vesselname'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('vesselname') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
  <div class="form-group">
    <input type="text" id="scargonature" class="form-control{{ $errors->has('cargonature') ? ' is-invalid' : '' }}" name="cargonature" >
    <label class="form-control-placeholder" for="cargonature">Bill of Lading details Date No: *</label>
    @if ($errors->has('cargonature'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('cargonature') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-4"> 
 <div class="form-group">
   <input type="text" id="squantity" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" >
   <label class="form-control-placeholder" for="quantity">Passenger ticket:/booking no: Date:*</label>
   @if ($errors->has('quantity'))
   <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('quantity') }}</strong>
  </span>
  @endif
</div>
</div>
</div>


<div class="row">
 <div class="col-md-12"> 
   <div class="form-group text-center" style="margin-bottom: 1.4em !important;">
     <label><u><b>Date of breach/ Due Date/ Date of cause of action & Date of notice</b></u></label>
   </div>
 </div>
</div>
<div class="row">
  <div class="col-md-6"> 
    <div class="form-group">
     <input type="text" id="svesselname" class="form-control{{ $errors->has('vesselname') ? ' is-invalid' : '' }}" name="vesselname" >
     <label class="form-control-placeholder" for="vesselname">Date of breach/ Due Date/ Date of cause of action: *</label>
     @if ($errors->has('vesselname'))
     <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('vesselname') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-6"> 
  <div class="form-group">
    <input type="text" id="scargonature" class="form-control{{ $errors->has('cargonature') ? ' is-invalid' : '' }}" name="cargonature" >
    <label class="form-control-placeholder" for="cargonature">Date of notice: *</label>
    @if ($errors->has('cargonature'))
    <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('cargonature') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>

</div>
</div>                  
<div class="modal-footer">
  <div class="mx-auto">
    <button type="submit" class="btn btn-success btn-space"  >Save</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
    <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
     Close
   </button>
 </div> 
</div>
</form>