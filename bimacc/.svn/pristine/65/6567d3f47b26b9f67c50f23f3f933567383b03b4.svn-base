  <div class="modal-body" style="margin-top: 15px">       
    <div class="row register-form" >
      @if($notice->arbitration_petionno != Null)
       <div class="col-md-4">
        <div class="form-group">
          <input type="text" id="name" value="{{$notice->arbitration_petionno}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder=" " readonly >
          <label class="form-control-placeholder" for="name">Claim Petition No</label>
          @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
          @endif
        </div> 
      </div> 
      <div class="col-md-4">
        <div class="form-group">
          <input type="text" id="name" value="{{$notice->claimnoticeno}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder=" " readonly >
          <label class="form-control-placeholder" for="name">Claim Notice No</label>
          @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
          @endif
        </div> 
      </div>
      @else
      <div class="col-md-4"> 
        <div class="form-group">
          <input type="text" id="name" value="{{$notice->claimnoticeno}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder=" " readonly >
          <label class="form-control-placeholder" for="name">Claim Notice No</label>
          @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
          @endif
        </div> 
      </div>
     
      @endif

       
      
      <div class="col-md-4">
       <div class="form-group">
         <input type="text" id="email"  value="{{ $notice->claimnoticestatus }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder=" " readonly>
         <label class="form-control-placeholder" for="email">Claim Status</label>
         @if ($errors->has('email'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
       <input type="text" id="daytimetelephone" value="{{ $notice->created_at }}" class="form-control{{ $errors->has('daytimetelephone') ? ' is-invalid' : '' }}" name="daytimetelephone" placeholder=" " readonly>
       <label class="form-control-placeholder" for="daytimetelephone">Claim Notice Created Date</label>
       @if ($errors->has('daytimetelephone'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('daytimetelephone') }}</strong>
      </span>
      @endif
    </div>
  </div>
  @if($notice->adminstration_fees != Null)
  <div class="col-md-4">
      <div class="form-group">
       <input type="text" id="adminstration_fees" value="{{ number_format((float)$notice->adminstration_fees, 2, '.', '') }}" class="form-control{{ $errors->has('adminstration_fees') ? ' is-invalid' : '' }}" name="adminstration_fees" placeholder=" " readonly>
       <label class="form-control-placeholder" for="adminstration_fees">Administration Fees</label>
       @if ($errors->has('adminstration_fees'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('adminstration_fees') }}</strong>
      </span>
      @endif
    </div>
  </div>
  <div class="col-md-4">
      <div class="form-group">
       <input type="text" id="arbitrator_fees"  value="{{ number_format((float)$notice->arbitrator_fees, 2, '.', '') }}"
 class="form-control{{ $errors->has('arbitrator_fees') ? ' is-invalid' : '' }}" name="arbitrator_fees" placeholder=" " readonly>
       <label class="form-control-placeholder" for="arbitrator_fees">Arbitration Fee</label>
       @if ($errors->has('arbitrator_fees'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('arbitrator_fees') }}</strong>
      </span>
      @endif
    </div>
  </div>
  
  @endif
  
</div>
</div>