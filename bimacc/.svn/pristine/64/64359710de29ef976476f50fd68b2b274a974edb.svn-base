  <!-- create Arbitration modal -->
  <div class="modal hide fade" id="createClaimantRespondantTypeModal" tabindex="-1" role="dialog" aria-labelledby="createClaimantRespondantlabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
      <div class="modal-content">  
        <div class="modal-header">
          <h5 class="modal-title" id="createClaimantRespondantlabel">Create Claimant Respondant Type</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"> 
         <form id="type_form" action="{{ route('claimant_respondant_type.store') }}" method="POST" >
           @csrf 
           <div class="row register-form">
             <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="claimant_respondant_type_Code" name="claimant_respondant_type_Code" class="form-control" >
                <label class="form-control-placeholder" for="claimant_respondant_type_Code">Code*</label>
                @if ($errors->has('claimant_respondant_type_Code'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('claimant_respondant_type_Code') }}</strong>
                </span>
                @endif  
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <select name="type" id="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" >
                  <option value=""></option>
                  <option value="claimant" >Claimant</option>
                  <option value="respondant">Respondant</option>         
                </select>                
                <label id="type" class="form-control-placeholder" for="type">Type*</label>
                @if ($errors->has('type'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('type') }}</strong>
                </span>
                @endif                                 
              </div>            
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="claimant_respondant_type_name" name="claimant_respondant_type_name" class="form-control" >
                <label class="form-control-placeholder" for="claimant_respondant_type_name">Claimant/Respondant Name*</label>
                @if ($errors->has('claimant_respondant_type_name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('claimant_respondant_type_name') }}</strong>
                </span>
                @endif  
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <textarea name="claimant_respondant_type_description" class="form-control"></textarea>
                <label class="form-control-placeholder" for="claimant_respondant_type_description">Description*</label>
                @if ($errors->has('claimant_respondant_type_description'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('claimant_respondant_type_description') }}</strong>
                </span>
                @endif  
              </div>
            </div>
          </div>            
         
    </form>

        </div>
        <div class="modal-footer">
          <div class="mx-auto">

            <button type="submit" id="register" class="btn btn-success btn-space" id="typebutton" onclick="typebuttonclick()">Save</button>
            <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
            <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">Cancel</span>
            </button>              
          </div>
        </div> 
      </div>             
    </form>

  </div>
</div>
<script>
function typebuttonclick() {
    
  var claimant_respondant_type_Code =  $('#claimant_respondant_type_Code').val();
  // alert(security_type_code);
     if (claimant_respondant_type_Code =='') 
     {
       swal("Enter Claimant Respondant Type Code", "", "error");
     return false;
     }
     var type =  $('#type').val();
     if (type =='') 
     {
       swal("Enter Type  ", "", "error");
     return false;
     }
      var claimant_respondant_type_name =  $('#claimant_respondant_type_name').val();
     if (claimant_respondant_type_name =='') 
     {
       swal("Enter Name", "", "error");
     return false;
     }
 $("#typebutton").attr("disabled", true);
     document.getElementById('type_form').submit();
   }
     </script>










<!-- End of create Arbitration modal -->





