  @if (count($errors) > 0)
    <script>
        $( document ).ready(function() {
            $('#createsecurityMasterModal').modal('show');
        });
    </script>
@endif
  <!-- create Arbitration modal -->
  <div class="modal fade" id="createsecurityMasterModal" tabindex="-1" role="dialog" aria-labelledby="createsecurityMasterlabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">                      
                    <div class="modal-header">
                      <h5 class="modal-title" id="createsecurityMasterlabel">Create Security Master</h5>
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

     
  <form action="{{ route('securitytypes.store') }}" method="POST" id="security_form">
      @csrf
                  <div class="row register-form">

                    <div class="col-md-6">
       
              <div class="form-group">
                  
                  <input type="text" name="security_type_code" id="security_type_code" class="form-control" >
                  <label id="security_type_code" class="form-control-placeholder" for="security_type_code">Security Type Code*</label>
              </div>
          </div>

                          <div class="col-md-6">
       
              <div class="form-group">
                  
                  <input type="text" name="security_type_name" id="security_type_name" class="form-control" >
                  <label id="security_type_name" class="form-control-placeholder" for="security_type_name">Security Type Name*</label>
              </div>
          </div>
         <div class="col-md-12">
              <div class="form-group">                  
                  <textarea class="form-control"  name="security_type_description" id="security_type_description"></textarea>
                  <label id="security_type_description" class="form-control-placeholder" for="security_type_description">Security Type Description*</label>
              </div>
          </div>
</div> 
</div> 
           <div class="modal-footer">
                  <div class="mx-auto">

         
                  <button type="button" class="btn btn-primary" onclick="securitybuttonclick()" id="securitybutton">Submit</button>
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
  <script>
function securitybuttonclick() {

    
  var security_type_code =  $('#security_type_code').val();
     if (security_type_code =='') 
     {
       swal("Enter Security Type Code ", "", "error");
     return false;
     }
     var security_type_name =  $('#security_type_name').val();
     if (security_type_name =='') 
     {
       swal("Enter Security Type Name ", "", "error");
     return false;
     }
      var security_type_description =  $('#security_type_description').val();
     if (security_type_description =='') 
     {
       swal("Enter Security Type Description ", "", "error");
     return false;
     }
 $("#securitybutton").attr("disabled", true);
     document.getElementById('security_form').submit();
   }
     </script>