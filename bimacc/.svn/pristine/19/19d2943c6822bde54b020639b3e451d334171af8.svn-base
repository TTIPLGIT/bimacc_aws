  
<div class="modal fade" id="addfaqModal">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
    <form  action="{{ route('FAQ.store') }}" method="POST" id="faq_form">
			{{ csrf_field() }}
      <div class="modal-header">
        <h5 class="modal-title" id="addModal">Add FAQ</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
      <input type="hidden" class="form-control" required id="user_id" name="user_id" value="{{Auth::user()->id}}">		

    

        <div class="row register-form">
        <div class="col-md-6">
          <div class="form-group">
           <label><b>Module Name:</b><span style="color: red">*</span></label>            
           <select class=" form-control" id="module_name" name="module_name">
             <option value="">Select Module Name<span style="color: red">*</span></option>
                @foreach ($module_name as $data)
                    <option value="{{$data->id}}"> {{$data->module_name}}</option>
                @endforeach
           </select>	
        </div>
      </div>


        <div class="col-md-12">
          <div class="form-group">
           <label><b>Question:</b><span style="color: red">*</span></label>
           <input class="form-control" type="text" name="question"  id="question">
                            
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
         <label><b>Answer:</b><span style="color: red">*</span></label>
           <textarea class="form-control" rows="10" cols="100"   maxlength="500" id="answers" name="answer"> </textarea>

                            
        </div>
    </div>
  </div>              

<div class="modal-footer">
  <div class="mx-auto">
    <button type="button" class="btn btn-success btn-space"  onclick="save()"  id="savebutton">Save</button>
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
function save() {	

   var module_name =  $('#module_name').val();
  
     if (module_name =='') 
     {
       swal("Please Enter Module Name! ", "", "error");
     return false;
     }

     var question =  $('#question').val();
  
     if (question =='') 
      {
        swal("Please Enter Question! ", "", "error");
       return false;
      }

      var answers =  $('#answers').val();
  
      if (answers ==' ') 
       {
        swal("Please Enter Answer! ", "", "error");
        return false;
       }

	   document.getElementById('faq_form').submit();
	 }
	   </script>

















