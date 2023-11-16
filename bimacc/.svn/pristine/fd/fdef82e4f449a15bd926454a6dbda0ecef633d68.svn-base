
@foreach ($loan_type as $loan)
<div class="modal fade fade-scale" id="editLoanTypeModal{{$loan->id}}" tabindex="-1" role="dialog" aria-labelledby="editLoanTypelabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                
                  <div class="modal-header">
                    <h5 class="modal-title" id="editLoanTypelabel">Edit Loan Type</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body"> 

        <form  action="{{ route('loantype.update', $loan->id ) }}" method="POST" id="loanedit_form"> 
                         
            @csrf
            @method('PUT') 
                       

                <div class="row register-form">
                  <div class="col-md-6">
                    <div class="form-group">
<input type="text" id="loan_type_code1" name="loan_type_code"  value= "{{$loan->loan_type_code}}" class="form-control" required>
               <label class="form-control-placeholder" for="loan_type_code">Loan Type Code<span style="color: red">*</span></label>
               @if ($errors->has('loan_type_code'))
               <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('loan_type_code') }}</strong>
              </span>
              @endif  
            </div>

                  </div>

                   <div class="col-md-6">
                    <div class="form-group">
<input type="text" id="loan_type_name1" name="loan_type_name"  value= "{{$loan->loan_type_name}}" class="form-control" required>
               <label class="form-control-placeholder" for="loan_type_code">Loan Type Name<span style="color: red">*</span></label>
               @if ($errors->has('loan_type_name'))
               <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('loan_type_name') }}</strong>
              </span>
              @endif  
            </div>

                  </div>

                   <div class="col-md-6">
                    <div class="form-group">
                      <textarea name="loan_description1" class="form-control" value= "{{$loan->loan_description}}" required="true">{{$loan->loan_description}}</textarea>

               <label class="form-control-placeholder" for="loan_description">Loan Description<span style="color: red">*</span></label>
               @if ($errors->has('loan_description'))
               <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('loan_description') }}</strong>
              </span>
              @endif  
            </div>

                  </div>
               
                  
                    

             
        </div>              

                    
    </div>
    <div class="modal-footer">
                <div class="mx-auto">
                        <button type="submit" class="btn btn-success btn-space">Save</button>                       
                       
                        <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
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

    <!-- <script>
    function loaneditbuttonclick() {
    
  var loan_type_code =  $('#loan_type_code1').val();
  // alert(security_type_code);
     if (loan_type_code =='') 
     {
       swal("Enter Loan Type Code", "", "error");
     return false;
     }
     var loan_type_name =  $('#loan_type_name1').val();
     if (loan_type_name =='') 
     {
       swal("Enter Loan Type Name ", "", "error");
     return false;
     }
     //  var loan_description =  $('#loan_description').val();
     // if (loan_description =='') 
     // {
     //   swal("Enter Loan Type Description ", "", "error");
     // return false;
     // }
 $("#loaneditbutton").attr("disabled", true);
     document.getElementById('loanedit_form').submit();
   }
     </script> -->









