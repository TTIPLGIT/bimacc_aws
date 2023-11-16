@foreach ($arbitratorallocationfees as $arbitratorallocationfee) 
<div class="modal fade fade-scale" id="editArbitratorAllocationFeesModal{{$arbitratorallocationfee->id}}" tabindex="-1" role="dialog" aria-labelledby="editArbitratorAllocationFeeslabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
     
      <div class="modal-header">
        <h5 class="modal-title" id="editArbitratorAllocationFeeslabel">Edit Administration and Arbitration Fee</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
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

      <form  action="{{ route('arbitratorallocationfees.update', $arbitratorallocationfee->id ) }}" method="POST"> 

          @csrf
          @method('PUT')                        

          <div class="row register-form">
             <div class="col-md-6">
              <div class="form-group">
               <select class="form-control" name="currency" id="currency" required>
                <option value="">Select Currency</option>                
                <option value="INR" {{ ( $arbitratorallocationfee->currency == 'INR') ? 'selected' : '' }}>INR</option>
                <option value="USD" {{ ( $arbitratorallocationfee->currency == 'USD') ? 'selected' : '' }}>USD</option>                
              </select>
              <label class="form-control-placeholder" for="currency">Select Currency<span style="color: red">*</span></label> 
            </div>
          </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="claim_amount_form" class="form-control {{ $errors->has('claim_amount_form') ? ' is-invalid' : '' }}" name="claim_amount_form" value = "{{$arbitratorallocationfee->claim_amount_form}}" required >
                <label id="claim_amount_form" class="form-control-placeholder" for="claim_amount_form">Claim Amount From<span style="color: red">*</span></label>
                @if ($errors->has('claim_amount_form'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('claim_amount_form') }}</strong>
                </span>
                @endif                                 
              </div>            
            </div> 

            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="claim_amount_to" class="form-control {{ $errors->has('claim_amount_to') ? ' is-invalid' : '' }}" name="claim_amount_to" value = "{{$arbitratorallocationfee->claim_amount_to}}" required>
                <label id="claim_amount_to" class="form-control-placeholder" for="claim_amount_to">Claim Amount To<span style="color: red">*</span></label>
                @if ($errors->has('claim_amount_to'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('claim_amount_to') }}</strong>
                </span>
                @endif                                 
              </div>            
            </div> 

            
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="adminstration_fees" class="form-control {{ $errors->has('adminstration_fees') ? ' is-invalid' : '' }}" name="adminstration_fees" value = "{{$arbitratorallocationfee->adminstration_fees}}" required >
                <label id="adminstration_fees" class="form-control-placeholder" for="adminstration_fees">Administration Fees<span style="color: red">*</span></label>
                @if ($errors->has('adminstration_fees'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('adminstration_fees') }}</strong>
                </span>
                @endif                                 
              </div>            
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="arbitrator_fees" class="form-control {{ $errors->has('arbitrator_fees') ? ' is-invalid' : '' }}" name="arbitrator_fees" value = "{{$arbitratorallocationfee->arbitrator_fees}}" required >
                <label id="arbitrator_fees" class="form-control-placeholder" for="arbitrator_fees">Arbitrator Fees<span style="color: red">*</span></label>
                @if ($errors->has('arbitrator_fees'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('arbitrator_fees') }}</strong>
                </span>
                @endif                                 
              </div>            
            </div>
            <div class="col-md-6">
                <div class="form-group">
            <input type="number" id="arbitartion_percentage" class="form-control {{ $errors->has('') ? ' is-invalid' : '' }}" name="arbitartion_percentage" value = "{{$arbitratorallocationfee->arbitartion_percentage}}" required >
            <label id="arbitartion_percentage" class="form-control-placeholder" for="arbitartion_percentage">Arbitrator Fees Percentage<span style="color: red">*</span></label>
            @if ($errors->has('arbitartion_percentage'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('arbitartion_percentage') }}</strong>
            </span>
            @endif                                 
          </div>            
        </div>

            <div class="col-md-6">
              <div class="form-group">
                <textarea class="form-control" name="fees_description" value = "{{$arbitratorallocationfee->fees_description}}" required>{{$arbitratorallocationfee->fees_description}}</textarea>               
                <label id="fees_description" class="form-control-placeholder" for="fees_description">Fees Description<span style="color: red">*</span></label>

              </div>            
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

<script>
    $('.disputecategoryedit').change(function(){ 
      
        var categoryID = $(this).val();
        var select = $(this).attr("id");         
    if(categoryID){
        $.ajax({

           type:"GET",
           url:"{{url('/get-dispute-list')}}?dispute_categories_id="+categoryID,
           data:{select:select, categoryID:categoryID},
           success:function(res){                      
            if(res){
                $(".disputesubcategoryedit").empty();
                $(".disputesubcategoryedit").append('<option></option>');
                $.each(res,function(key,value){
                    $(".disputesubcategoryedit").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $(".disputesubcategoryedit").empty();
            }
           }
        });
    }     
   });
    
</script>

</div>


@endforeach













