@if($securitytypes_count = 0)
$security_types = SecurityTypes::findOrFail($id);
@endif
@foreach ($security_types as $security_type)
<div class="modal fade fade-scale" id="editSecurityMasterModal{{$security_type->id}}" tabindex="-1" role="dialog" aria-labelledby="editSecurityMasterlabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                 
                  <div class="modal-header">
                    <h5 class="modal-title" id="editSecurityMasterlabel">Edit Security Master</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body"> 
     <form action="{{ route('securitytypes.update',$security_type->id) }}" method="POST" id="securityedit_form">
     <input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}
       <div class="row register-form">
         <div class="col-md-6">
                          <div class="form-group">         
         <input type="text" name="security_type_code" id="security_type_code1" value="{{ $security_type->security_type_code }}" class="form-control" placeholder="Security Type Code" required="true">

         <label id="security_type_code" class="form-control-placeholder" for="security_type_code">Security Type Code*</label>
      </div>
    </div>
                        <div class="col-md-6">
                          <div class="form-group">         
         <input type="text" name="security_type_name" id="security_type_name1" value="{{ $security_type->security_type_name }}" class="form-control" placeholder="Security Type Name" required="true">
         <label id="security_type_name" class="form-control-placeholder" for="security_type_name">Security Type Name*</label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">        
        <textarea class="form-control"  name="security_type_description" id="security_type_description1" placeholder="Detail" required="true">{{ $security_type->security_type_description }}</textarea>
        <label id="security_type_description" class="form-control-placeholder" for="security_type_description">Security Type Description*</label>
      </div>

     

    </div>
   


      </div>     

      
<div class="modal-footer">
                <div class="mx-auto">    
     
      <button type="submit" class="btn btn-primary" >Submit</button>
      <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Cancel</span>
                        </button>
    </div>
  </div>
    </form>
    </div>
    </div>
    </div>
    </div>
  
 <!-- <script>
function securityeditbuttonclick() {

    
  var security_type_code =  $('#security_type_code1').val();
  // alert(security_type_code);
     if (security_type_code =='') 
     {
       swal("Enter Security Type Code ", "", "error");
     return false;
     }
     var security_type_name =  $('#security_type_name1').val();
     if (security_type_name =='') 
     {
       swal("Enter Security Type Name ", "", "error");
     return false;
     }
      var security_type_description =  $('#security_type_description1').val();
     if (security_type_description =='') 
     {
       swal("Enter Security Type Description ", "", "error");
     return false;
     }
 $("#securityeditbutton").attr("disabled", true);
     document.getElementById('securityedit_form').submit();
   }
     </script> -->
  @endforeach






