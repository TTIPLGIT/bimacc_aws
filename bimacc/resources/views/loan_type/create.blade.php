   @if (count($errors) > 0)
   <script>
    $( document ).ready(function() {
      $('#createLoanTypeModal').modal('show');
    });
  </script>
  @endif
  <!-- create Arbitration modal -->
  <div class="modal hide fade" id="createLoanTypeModal" tabindex="-1" role="dialog" aria-labelledby="createLoanTypelabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
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
          <h5 class="modal-title" id="createLoanTypelabel">Create Loan Type</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="false">×</span>
          </button>
        </div>
        <div class="modal-body"> 

         <form  action="{{ route('loantype.store') }}" method="POST" id="loan_form">
           @csrf 
           <div class="row register-form">
             <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="loan_type_code" name="loan_type_code" class="form-control" >
                <label class="form-control-placeholder" for="loan_type_code">Loan Type Code<span style="color: red">*</span></label>
                @if ($errors->has('loan_type_code'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('claimant_respondant_type_Code') }}</strong>
                </span>
                @endif  
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="loan_type_name" name="loan_type_name" class="form-control" >
                <label class="form-control-placeholder" for="loan_type_name">Loan Type Name<span style="color: red">*</span></label>
                @if ($errors->has('loan_type_name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('loan_type_name') }}</strong>
                </span>
                @endif  
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">

                <textarea name="loan_description" id="loan_description"class="form-control"></textarea>
                <label class="form-control-placeholder" id="loan_description" for="loan_description">Loan Description<span style="color: red">*</span></label>
                @if ($errors->has('loan_description'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('loan_description') }}</strong>
                </span>
                @endif  
              </div>
            </div>




          </div>
        </form>           
      </div> 
      <div class="modal-footer">
        <div class="mx-auto">
          <button  id="button" class="btn btn-success btn-space" onclick= "loanbuttonclick()" id="loanbutton">Save</button>
          <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
          <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">Cancel</span>
          </button>              
        </div>
      </div>
    </div> 
  </div>
</div>


<script>
  function loanbuttonclick() {
    var loan_type_code =  $('#loan_type_code').val();
  if (loan_type_code =='') 
  {
   swal("Enter Loan Type Code", "", "error");
   return false;
 }
 var loan_type_name =  $('#loan_type_name').val();
 if (loan_type_name =='') 
 {
   swal("Enter Loan Type Name ", "", "error");
   return false;
 }

 $("#loanbutton").attr("disabled", true);
 document.getElementById('loan_form').submit();
}
</script>












<!-- End of create Arbitration modal -->





