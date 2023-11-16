@foreach($FAQ as $data)
<div class="modal fade" id="showfaqmodal{{$data->id}}">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
    <form  action="{{ route('FAQ.show',$data->id) }}" method="POST" id="faq_form{{$data->id}}">
			{{ csrf_field() }}
            @method('PUT')  
      <div class="modal-header">
        <h5 class="modal-title" id="#editModal">show FAQ </h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 
      <input type="hidden" class="form-control" required id="user_id" name="user_id" value="{{Auth::user()->id}}">		

        <div class="row register-form">
        <div class="col-md-6">
          <div class="form-group">
           <label><b>Module_Name:</b><span style="color: red">*</span></label>
           <select class=" form-control" id="module_name{{$data->id}}" name="module_name" disabled="">
             <option value="">Select Module Name<span style="color: red">*</span></option>
                @foreach ($module_name as $data1)
                <option value="{{$data1->id}}"  {{$data1->id == $data->module_id ? 'selected':''}} > {{$data1->module_name}}</option>
                @endforeach
           </select>	
        </div>
      </div>

      <div class="col-md-12">
          <div class="form-group">
           <label><b>Question:</b><span style="color: red">*</span></label>
           <input class="form-control{{ $errors->has('question') ? ' is-invalid' : '' }}" type="text" name="question"  id="question{{$data->id}}"  value="{{$data->question}}" disabled="">
           @if ($errors->has('question'))
                               <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('question') }}</strong>
                               </span>
                             @endif      
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
         <label><b>Answer:</b><span style="color: red">*</span></label>
           <textarea class="form-control{{ $errors->has('answer') ? ' is-invalid' : '' }}" rows="10" cols="100"   maxlength="500" id="answer{{$data->id}}" name="answer" disabled="">{{$data->answer}}</textarea>
           @if ($errors->has('answer'))
                               <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('answer') }}</strong>
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

     var question =  $('#question'+id).val();
  
  if (question =='') 
   {
     swal("Please Enter Question! ", "", "error");
    return false;
   }

   var answer =  $('#answer'+id).val();

   if (answer =='') 
    {
     swal("Please Enter Answer! ", "", "error");
     return false;
    }


	   document.getElementById('faq_form'+id).submit();
	 }
	   </script>


@endforeach














