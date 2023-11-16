<!-- Create Respondant Information Modal-->
@foreach ($ClaimFees as $ClaimFee)
<div class="modal fade" id="editClaimFeeModal{{$ClaimFee->id}}" tabindex="-1" role="dialog" aria-labelledby="claimdetailslabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="claimdetailslabel">Edit Relief Request</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
        <form  action="{{ route('claimfees.update', $ClaimFee->id) }}" method="POST">
          @csrf  
          @method('PUT') 
          <div class="row register-form">
            <div class="col-md-6">
              <div class="form-group">               
                @foreach ($claimnoticedisputecategories as $categories)
                <select name="dispute_categories_id" class="form-control">
                  <option value="{{$categories->dispute_categories_id}}">{{$categories->category_name}}</option>
                </select>                         
              
              <label class="form-control-placeholder" for="dispute_categories_id">Main Dispute Category*</label> 
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
            <select name="dispute_subcategories_id" class="form-control">
                  <option value="{{$categories->dispute_subcategories_id}}">{{$categories->subcategory_name}}</option>
                </select>
              @endforeach           
            <label class="form-control-placeholder" for="dispute_categories_id">Dispute Sub Category*</label>
          </div>
        </div>
          
        <div class="col-md-6">
         <div class="form-group">
          @foreach($totalclaimamount as $totalclaim)
           <input type="text" id="claim_amount" class="form-control{{ $errors->has('claim_amount') ? ' is-invalid' : '' }}" name="claim_amount" required value="{{$totalclaim->total_amount}}">
           @endforeach
           <label class="form-control-placeholder" for="claim_amount">Claim Amount*</label>
           @if ($errors->has('claim_amount'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('claim_amount') }}</strong>
          </span>
          @endif
        </div>
      </div>

        <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-placeholder" for="claim_amount_purpose">Registration Fees</label>
          @foreach($registrationfees as $registrationfee)
          <input type="text" id="claim_amount_purpose" class="form-control{{ $errors->has('registration_fees') ? ' is-invalid' : '' }}" name="registration_fees" required value="{{$registrationfee->registration_fee}}" >
          @endforeach
          
          @if ($errors->has('registration_fees'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('registration_fees') }}</strong>
          </span>
          @endif
        </div>

      </div>  

        <div class="col-md-6">
        <div class="form-group">
          <input type="text" id="claim_amount_purpose" class="form-control{{ $errors->has('claim_amount_purpose') ? ' is-invalid' : '' }}" name="claim_amount_purpose" required value="{{$ClaimFee->claim_amount_purpose}}">
          <label class="form-control-placeholder" for="claim_amount_purpose">Claim Amount Purpose*</label>
          @if ($errors->has('claim_amount_purpose'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('claim_amount_purpose') }}</strong>
          </span>
          @endif
        </div>
      </div>  


  </div>
</div>                    
<div class="mx-auto">
  <button type="submit" class="btn btn-success btn-space">Save</button>  
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