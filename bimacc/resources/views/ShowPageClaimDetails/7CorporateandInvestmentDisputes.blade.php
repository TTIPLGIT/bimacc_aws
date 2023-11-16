        <div class="col-md-12" style="pointer-events: none;">
          <div class="row">
           <div class="col-md-12"> 
             <div class="form-group text-center" style="margin-bottom: 1.4em; color:red; font-size: 15px;">
              <!-- <label><b>Please fill in the applicable details  pertaining to the dispute</b></label> -->
            </div> 
             
          </div>
           <div class="col-md-12">
                       
             <div class="form-group text-center" style="margin-bottom: 1.4em">
              <label><u><b>Details Of Contract</b></u></label>
            </div>
          </div>
        </div>         
      
        
    <div class="row">

       

      <div class="col-md-3"> 
          <div class="form-group">
            <input type="date" id="csdate_of_agreement" class="form-control{{ $errors->has('date_of_agreement') ? ' is-invalid' : '' }}" name="date_of_agreement" placeholder=" " value="{{$details->date_of_agreement}}">
            <label class="form-control-placeholder" for="date_of_agreement">Date of Agreement:</label>
            @if ($errors->has('date_of_agreement'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('date_of_agreement') }}</strong>
            </span>
            @endif
          </div>
        </div>     

      <div class="col-md-3"> 
         <div class="form-group">
           <input type="date" id="csdate_of_breach" class="form-control{{ $errors->has('date_of_breach') ? ' is-invalid' : '' }}" name="date_of_breach" placeholder=" " value="{{$details->date_of_breach}}">
           <label class="form-control-placeholder" for="date_of_breach">Date of Breach: </label>
           @if ($errors->has('date_of_breach'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_breach') }}</strong>
          </span>
          @endif
        </div>
      </div>
     <div class="col-md-3"> 
         <div class="form-group">
           <input type="date" id="csdate_of_notice" class="form-control{{ $errors->has('date_of_notice') ? ' is-invalid' : '' }}" name="date_of_notice" placeholder=" " value="{{$details->date_of_notice}}">
           <label class="form-control-placeholder" for="date_of_notice">Date of Notice: </label>
           @if ($errors->has('date_of_notice'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('date_of_notice') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-3"> 
      <div class="form-group">
       <input type="text"  class="form-control{{ $errors->has('reason_for_claim') ? ' is-invalid' : '' }}" name="reason_for_claim" value="{{$details->reason_for_claim}}">
       <label class="form-control-placeholder" for="reason_for_claim">Reason For Claim:</label>
       @if ($errors->has('reason_for_claim'))
       <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('reason_for_claim') }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>

</div>