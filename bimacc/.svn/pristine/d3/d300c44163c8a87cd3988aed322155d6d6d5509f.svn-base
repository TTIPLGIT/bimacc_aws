@foreach ($claimnotices as $notice)
<div class="modal fade" id="respondentdisputemodal" tabindex="-1" role="dialog" aria-labelledby="respondentdisputemodal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="respondentdisputemodal"></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
         <form  action="{{ route('claimantrespondantaccess.disputedetail')}}" method="POST" enctype="multipart/form-data">

        @csrf 
        <div class="row register-form">
           <!-- <input type="number" name="claimnoticeid"   value="{{$notice->id}}"> -->
          <input type="text" name="claimnoticeid" style="display: none;"  value="{{$notice->id}}">
          <input type="text" name="user_id"  style="display: none;" value="{{$user_id}}">

           
          <div class="col-md-6">
              <div class="form-group">
               <select class="form-control" name="dispute_categories_id" id="disputecategory_res" required="true" required>
                <option value="">Select Main Dispute Category</option>
                @foreach ($dispute_categories as $category)
                <option value="{{ $category->id }}"> {{$category->category_name}}</option>
                @endforeach
              </select>
              <label class="form-control-placeholder" for="dispute_categories_id">Main Dispute Category<span style="color: red">*</span></label> 
            </div>
          </div>
          <div class="col-md-6" >
            <div class="form-group">
             <select class="form-control" id ="subcategory_res" name="dispute_subcategories_id" onchange="subdispute_type_select()" required="true" onchange="subdispute_type_select()" disabled>
              <option value=""> Select Sub Dispute Category</option>
              @foreach ($dispute_subcategories as $category) 
              <option value=""> </option>
              @endforeach
            </select>
            <label class="form-control-placeholder" for="dispute_subcategories_id">Sub Dispute Category<span style="color: red">*</span></label>
          </div>
        </div>
        <div class="col-md-6" id="others" style="display: none;">
          <div class="form-group">
            <input type="text"  id="others" class="form-control{{ $errors->has('others') ? ' is-invalid' : '' }}" name="others" >
            <label class="form-control-placeholder" for="others" >Others<span style="color: red">*</span></label>
          </div>
        </div> 
         



        </div>              


<div class="modal-footer">
        <div class="mx-auto">
          <button type="submit" class="btn btn-success btn-space"> Save</button>
          <button type="reset" class="btn btn-warning btn-space" value="Reset!">Clear</button>
          <button class="btn btn-danger btn-space" type="button" data-dismiss="modal" aria-label="Close">
           Close
         </button>           
       </div> 
     </div>

       </form>
     </div>
   </div>
 </div>
</div>

  @endforeach    

<script type="text/javascript">
  window.onload=function() {
    setTimeout(function() {
      document.getElementById('submitButton').disabled = false;
    }, 5000); 
  }
</script>
<script>

  function sortReponse(data)
{
    var sorted = [];
    $(data).each(function(k, v) {
        for(var key in v) {
            sorted.push({key: key, value: v[key]})
        }
    });

    return sorted.sort(function(a, b){
        if (a.value < b.value) return -1;
        if (a.value > b.value) return 1;
        return 0;
    });
}
window.onload = function(){


  var inputvalue = document.getElementById("subcategory_res").value;
  if (inputvalue=="")
  {
     $("#others").hide();
  }

};
</script>
<script type="text/javascript">
  
   function subdispute_type_select()
 {
  
  var inputvalue = document.getElementById("subcategory_res").value;
  
      if (inputvalue >= 240 &&  inputvalue <= 255){

$("#others").show();
}
else if (inputvalue == 161){

$("#others").show();
}
else if (inputvalue == 237){

$("#others").show();
}
else{
  $("#others").hide();
}
}
</script>





