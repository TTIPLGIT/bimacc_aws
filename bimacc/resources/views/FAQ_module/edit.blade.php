@foreach($module_name as $data)
<div class="modal fade" id="editmodulemodal{{$data->id}}">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
    <form  action="{{ route('FAQ_module.update',$data->id) }}" method="POST" id="module_form{{$data->id}}">
			{{ csrf_field() }}
            @method('PUT')  
      <div class="modal-header">
        <h5 class="modal-title" id="#editModal">Edit FAQ Module</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
      <input type="hidden" class="form-control" required id="user_id" name="user_id" value="{{Auth::user()->id}}">		
      <input type="hidden" class="form-control" required id="id" name="id" value="{{$data->id}}">	
        <div class="row register-form">
        <div class="col-md-12">
          <div class="form-group">
           <label><b>Module_Name:</b><span style="color: red">*</span></label>
           <input class="form-control{{ $errors->has('module_name') ? ' is-invalid' : '' }}" type="text" name="module_name"  id="module_name{{$data->id}}" value="{{$data->module_name}}" >
                        @if ($errors->has('module_name'))
                               <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('module_name') }}</strong>
                               </span>
                             @endif

        </div>
      </div>
  </div>              

<div class="modal-footer">
  <div class="mx-auto">
    <button type="button" class="btn btn-success btn-space" onclick="editbuttonclick('{{$data->id}}')"  id="editbutton">Save</button>
    <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
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

<script>
function  editbuttonclick(id){	

   var module_name =  $('#module_name'+id).val();
  
     if (module_name =='') 
     {
       swal("Please Enter Module Name! ", "", "error");
     return false;
     }
    var id=$('#id');
 
	   document.getElementById('module_form'+id).submit();
	 }
	   </script>


@endforeach














