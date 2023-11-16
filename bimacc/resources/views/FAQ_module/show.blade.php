@foreach($module_name as $data)
<div class="modal fade" id="showmoduleModal{{$data->id}}">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
    <form  action="{{ route('FAQ_module.show',$data->id) }}" method="POST" id="module_form{{$data->id}}">
			{{ csrf_field() }}
      <div class="modal-header">
        <h5 class="modal-title" id="#editModal">Show FAQ Module</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
        <div class="row register-form">
        <div class="col-md-12">
          <div class="form-group">
           <label><b>Module_Name:</b><span style="color: red">*</span></label>
           <input class="form-control{{ $errors->has('module_name') ? ' is-invalid' : '' }}" type="text" name="module_name"  id="module_name{{$data->id}}" value="{{$data->module_name}}" disabled="">
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

	   document.getElementById('module_form'+id).submit();
	 }
	   </script>
@endforeach