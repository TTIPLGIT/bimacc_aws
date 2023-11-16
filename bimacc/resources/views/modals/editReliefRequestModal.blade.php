<!-- Create Respondant Information Modal-->
@foreach ($ReliefRequests as $ReliefRequest)
<div class="modal fade" id="editidReliefrequest{{$ReliefRequest->id}}" tabindex="-1" role="dialog" aria-labelledby="claimdetailslabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="claimdetailslabel">Edit Relief Request</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
        <form  action="{{ route('reliefrequest.update', $ReliefRequest->id) }}" method="POST">
          @csrf  
          @method('PUT') 
          <div class="row register-form">
            <div class="col-md-6">
             <div class="form-group">

               <input type="number" id="recovery_of_money" class="form-control{{ $errors->has('recovery_of_money') ? ' is-invalid' : '' }}" name="recovery_of_money" value="{{$ReliefRequest->recovery_of_money }}" required>
               <label class="form-control-placeholder" for="recovery_of_money">Recovery Of Money ({{$ReliefRequest->currency}}) *</label>
               @if ($errors->has('recovery_of_money'))
               <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('recovery_of_money') }}</strong>
              </span>
              @endif
            </div>
          </div>
          
        <div class="col-md-6">
          <div class="form-group">
           <select class="form-control" name="simple_compound">
              <option value=""></option>
               <option value="simple" {{ $ReliefRequest->simple_compound == 'simple' ? 'selected' : '' }} >Simple</option>
               <option value="compound" {{ $ReliefRequest->simple_compound == 'compound' ? 'selected' : '' }} >Compound</option>              
              
             </select>
            <label class="form-control-placeholder" for="simple_compound">Interest*</label>
            @if ($errors->has('simple_compound'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('simple_compound') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="col-md-6">

          <div class="form-group">
            <input type="text" id="penal_interest" class="form-control{{ $errors->has('penal_interest') ? ' is-invalid' : '' }}" name="penal_interest" required value="{{$ReliefRequest->penal_interest }}">
            <label class="form-control-placeholder" for="penal_interest">Penal Interest (%)*</label>
            @if ($errors->has('penal_interest'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('penal_interest') }}</strong>
            </span>
            @endif

          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">

            <select class="form-control" name="pun_loquid_unliquid">
              <option value=""></option>
               <option value="punative" {{ $ReliefRequest->pun_loquid_unliquid == 'punative' ? 'selected' : '' }} >Punative</option>
               <option value="liquiated" {{ $ReliefRequest->pun_loquid_unliquid == 'liquiated' ? 'selected' : '' }} >Liquiated</option> 
               <option value="unliquidated" {{ $ReliefRequest->pun_loquid_unliquid == 'unliquidated' ? 'selected' : '' }}>Unliquidated</option> 
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
           <input type="number" id="specific_perfomances" class="form-control{{ $errors->has('specific_perfomances') ? ' is-invalid' : '' }}" name="specific_perfomances" required value="{{$ReliefRequest->specific_perfomances }}">
           <label class="form-control-placeholder" for="specific_perfomances">Specific Perfomances ({{$ReliefRequest->currency}}) *</label>
           @if ($errors->has('specific_perfomances'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('specific_perfomances') }}</strong>
          </span>
          @endif      
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">

          <input type="number" id="recident_backwages" class="form-control{{ $errors->has('recident_backwages') ? ' is-invalid' : '' }}" name="recident_backwages" required value="{{$ReliefRequest->recident_backwages }}">
          <label class="form-control-placeholder" for="recident_backwages">Reinstatement And/Or Backwages ({{$ReliefRequest->currency}}) *</label>
          @if ($errors->has('recident_backwages'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('recident_backwages') }}</strong>
          </span>
          @endif 
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <input type="number" id="CANCELLATION_OF_ALOTTMENT_OF_SHARES" class="form-control{{ $errors->has('CANCELLATION_OF_ALOTTMENT_OF_SHARES') ? ' is-invalid' : '' }}" name="CANCELLATION_OF_ALOTTMENT_OF_SHARES" required value="{{$ReliefRequest->CANCELLATION_OF_ALOTTMENT_OF_SHARES }}">
          <label class="form-control-placeholder" for="CANCELLATION_OF_ALOTTMENT_OF_SHARES" >Cancellation Of Alottment Of Shares ({{$ReliefRequest->currency}}) *</label>
          @if ($errors->has('CANCELLATION_OF_ALOTTMENT_OF_SHARES'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('CANCELLATION_OF_ALOTTMENT_OF_SHARES') }}</strong>
          </span>
          @endif    
        </div>
      </div> 
      <div class="col-md-6">
        <div class="form-group">
         <input type="number" id="SETOFF_SAND_COUNTERCLAIM" class="form-control{{ $errors->has('SETOFF_SAND_COUNTERCLAIM') ? ' is-invalid' : '' }}" name="SETOFF_SAND_COUNTERCLAIM" required  value="{{$ReliefRequest->SETOFF_SAND_COUNTERCLAIM }}">
         <label class="form-control-placeholder" for="SETOFF_SAND_COUNTERCLAIM">Setoffs And Counterclaim ({{$ReliefRequest->currency}}) *</label>
         @if ($errors->has('SETOFF_SAND_COUNTERCLAIM'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('SETOFF_SAND_COUNTERCLAIM') }}</strong>
        </span>
        @endif
      </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
         <input type="number" id="PARTITION_AND_DISTRIBUTION_OF_ASSETS" class="form-control{{ $errors->has('PARTITION_AND_DISTRIBUTION_OF_ASSETS') ? ' is-invalid' : '' }}" name="PARTITION_AND_DISTRIBUTION_OF_ASSETS" required  value="{{$ReliefRequest->PARTITION_AND_DISTRIBUTION_OF_ASSETS }}">
         <label class="form-control-placeholder" for="PARTITION_AND_DISTRIBUTION_OF_ASSETS">Partition And Distripution Of Assets ({{$ReliefRequest->currency}}) *</label>
         @if ($errors->has('PARTITION_AND_DISTRIBUTION_OF_ASSETS'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('PARTITION_AND_DISTRIBUTION_OF_ASSETS') }}</strong>
        </span>
        @endif
      </div>
    </div>

     <div class="col-md-6">
        <div class="form-group">
         <input type="text" id="DECLARATION" class="form-control{{ $errors->has('DECLARATION') ? ' is-invalid' : '' }}" name="DECLARATION" required  value="{{ $ReliefRequest->DECLARATION }}">
         <label class="form-control-placeholder" for="DECLARATION">Declaration *</label>
         @if ($errors->has('DECLARATION'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('DECLARATION') }}</strong>
        </span>
        @endif
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <textarea class="form-control" name="ANY_OTHER_RELIEF_AS_SPECIFIED" id="ANY_OTHER_RELIEF_AS_SPECIFIED" value="{{$ReliefRequest->ANY_OTHER_RELIEF_AS_SPECIFIED}}">{{$ReliefRequest->ANY_OTHER_RELIEF_AS_SPECIFIED}}</textarea>
         <label class="form-control-placeholder" for="ANY_OTHER_RELIEF_AS_SPECIFIED">Any Other Relief as Specified *</label>
      </div>
      
    </div>

  </div>
</div>                    
<div class="mx-auto">
  <button type="submit" class="btn btn-success btn-space">Save</button>
  <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
  <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
   Close
 </button>
</div> 
</div>          
</form>
</div>
</div>
</div> 
</div>
@endforeach
<!-- End Of Respondant Information Modal -->