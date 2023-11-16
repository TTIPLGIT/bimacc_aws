<!-- Create Respondant Information Modal-->
<div class="modal fade" id="idReliefRequestdetails" tabindex="-1" role="dialog" aria-labelledby="claimdetailslabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="claimdetailslabel">Relief Request</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
        @foreach ($claimantinformations as $claimantinformation)
        <form  action="{{ route('reliefrequest.store') }}" method="POST">
          @csrf  
          <div class="row register-form">
            <div class="col-md-6">
              <div class="form-group">
               <input type="number" id="recovery_of_money" class="form-control{{ $errors->has('recovery_of_money') ? ' is-invalid' : '' }}" name="recovery_of_money" required>
               <label class="form-control-placeholder" for="recovery_of_money">Recovery Of Money({{$claimantinformation->currency}}) *</label>
               @if ($errors->has('recovery_of_money'))
               <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('recovery_of_money') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
             <select class="form-control" name="simple_compound" id="simple_compound" required>
              <option value=""></option>
               <option value="simple">Simple</option>
               <option value="compound">Compound</option>              
              
             </select>
             <label class="form-control-placeholder" for="simple_compound">Interest *</label>
             @if ($errors->has('simple_compound'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('simple_compound') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group penal_interest">
            <input type="text" id="penal_interest" class="form-control{{ $errors->has('penal_interest') ? ' is-invalid' : '' }}" name="penal_interest" required maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
            <label class="form-control-placeholder" for="penal_interest">Penal Interest(%) *</label>
            @if ($errors->has('penal_interest'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('penal_interest') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-6">

          <div class="form-group">
            <select class="form-control" name="pun_loquid_unliquid" id="pun_loquid_unliquid" required>
              <option value=""></option>
               <option value="punative">Punative</option>
               <option value="liquiated">Liquiated</option> 
               <option value="unliquidated">Unliquidated</option> 
             </select>
            <label class="form-control-placeholder" for="pun_loquid_unliquid">Damages*</label>
            @if ($errors->has('pun_loquid_unliquid'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('pun_loquid_unliquid') }}</strong>
            </span>
            @endif

          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">

            <input type="number" id="specific_perfomances" class="form-control{{ $errors->has('specific_perfomances') ? ' is-invalid' : '' }}" name="specific_perfomances" required>
            <label class="form-control-placeholder" for="specific_perfomances">Specific Perfomances({{$claimantinformation->currency}}) *</label>
            @if ($errors->has('specific_perfomances'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('specific_perfomances') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
           <input type="number" id="recident_backwages" class="form-control{{ $errors->has('recident_backwages') ? ' is-invalid' : '' }}" name="recident_backwages" required>
           <label class="form-control-placeholder" for="recident_backwages">Reinstatement And/Or Backwages({{$claimantinformation->currency}}) *</label>
           @if ($errors->has('recident_backwages'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('recident_backwages') }}</strong>
          </span>
          @endif      
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">

          <input type="number" id="CANCELLATION_OF_ALOTTMENT_OF_SHARES" class="form-control{{ $errors->has('CANCELLATION_OF_ALOTTMENT_OF_SHARES') ? ' is-invalid' : '' }}" name="CANCELLATION_OF_ALOTTMENT_OF_SHARES" required>
          <label class="form-control-placeholder" for="CANCELLATION_OF_ALOTTMENT_OF_SHARES">Cancellation Of Alottment Of Shares({{$claimantinformation->currency}}) *</label>
          @if ($errors->has('CANCELLATION_OF_ALOTTMENT_OF_SHARES'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('CANCELLATION_OF_ALOTTMENT_OF_SHARES') }}</strong>
          </span>
          @endif 
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <input type="number" id="SETOFF_SAND_COUNTERCLAIM" class="form-control{{ $errors->has('SETOFF_SAND_COUNTERCLAIM') ? ' is-invalid' : '' }}" name="SETOFF_SAND_COUNTERCLAIM" required>
          <label class="form-control-placeholder" for="SETOFF_SAND_COUNTERCLAIM">Setoffs And Counterclaim ({{$claimantinformation->currency}})*</label>
          @if ($errors->has('SETOFF_SAND_COUNTERCLAIM'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('SETOFF_SAND_COUNTERCLAIM') }}</strong>
          </span>
          @endif    
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">

         <input type="number" id="PARTITION_AND_DISTRIBUTION_OF_ASSETS" class="form-control{{ $errors->has('PARTITION_AND_DISTRIBUTION_OF_ASSETS') ? ' is-invalid' : '' }}" name="PARTITION_AND_DISTRIBUTION_OF_ASSETS" required>
         <label class="form-control-placeholder" for="PARTITION_AND_DISTRIBUTION_OF_ASSETS">Partition And Distripution Of Assets ({{$claimantinformation->currency}}) *</label>
         @if ($errors->has('PARTITION_AND_DISTRIBUTION_OF_ASSETS'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('PARTITION_AND_DISTRIBUTION_OF_ASSETS') }}</strong>
        </span>
        @endif
      </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">

         <textarea id="DECLARATION" class="form-control{{ $errors->has('DECLARATION') ? ' is-invalid' : '' }}" name="DECLARATION" required></textarea>
         <label class="form-control-placeholder" for="DECLARATION">Declaration*</label>
         @if ($errors->has('DECLARATION'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('DECLARATION') }}</strong>
        </span>
        @endif
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <textarea class="form-control"  id="ANY_OTHER_RELIEF_AS_SPECIFIED1" name="ANY_OTHER_RELIEF_AS_SPECIFIED" required></textarea>
         <label class="form-control-placeholder" for="ANY_OTHER_RELIEF_AS_SPECIFIED1">Any Other Relief as Specified*</label>
      </div>
      
    </div>

  </div>
</div> 
<div class="modal-footer">                   
  <div class="mx-auto">
    <button type="submit" class="btn btn-success btn-space">Save</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
    <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
     Close
   </button>
 </div>
</div> 
</div>          
</form>
@endforeach
</div>
</div>
</div> 
</div>

<script>
  $('.penal_interest input[type=text]').on('keyup',function(e){
    
      var oldstr=$('.penal_interest input[type=text]').val();
      var tokens = oldstr.split('%');
            var suffix = tokens.pop() + '%';
            var prefix = tokens.join("");
      $('.penal_interest input[type=text]').val(prefix+suffix);
    });
  
</script>

<!-- End Of Respondant Information Modal -->