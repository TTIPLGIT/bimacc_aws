  
<div class="modal fade" id="addModal">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">

    <form  action="{{ route('FAQ_module.store') }}" method="POST" id="module_form">
			{{ csrf_field() }}

      <div class="modal-header">
        <h5 class="modal-title" id="addModal">Add FAQ_Module</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
      <input type="hidden" class="form-control" required id="user_id" name="user_id" value="{{Auth::user()->id}}">		

        <div class="row register-form">
        <div class="col-md-12">
          <div class="form-group">
           <label><b>Module Name:</b><span style="color: red">*</span></label>
           <input class="form-control" type="text" name="module_name"  id="module_name"  >
                            
        </div>
      </div>

  </div>              

<div class="modal-footer">
  <div class="mx-auto">
    <button type="button" class="btn btn-success btn-space" onclick="save()"  id="savebutton">Save</button>
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
</div>


<script>
function save() {	

   var module_name =  $('#module_name').val();
  
     if (module_name =='') 
     {
       swal("Please Enter Module Name! ", "", "error");
     return false;
     }

	   document.getElementById('module_form').submit();
	 }
	   </script>
















