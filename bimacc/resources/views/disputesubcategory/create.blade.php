  
<div class="modal fade" id="createSubCategoryModal" tabindex="-1" role="dialog" aria-labelledby="createSubCategoryModallabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="createSubCategoryModallabel">Create Main Dispute Category</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> 

       <form  action="{{ route('disputesubcategory.store') }}" method="POST" id="subdispute_form">
        @csrf 
        

        <div class="row register-form">

          <div class="col-md-6">
            <div class="form-group">
             <input type="text" id="dispute_subcategory_Code" class="form-control{{ $errors->has('dispute_subcategory_Code') ? ' is-invalid' : '' }}" name="dispute_subcategory_Code" required>
             <label class="form-control-placeholder" for="dispute_subcategory_Code">Dispute Subcategory Code<span style="color: red">*</span></label>
             @if ($errors->has('dispute_subcategory_Code'))
             <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('dispute_subcategory_Code') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <select class="col-xs-12 col-sm-12 col-md-12 form-control" id="dispute_categories_id" name="dispute_categories_id">
              <option value="">Select Main Category<span style="color: red">*</span></option>
              @foreach ($disputeCategory as $category)
              <option value="{{ $category->id }}"> {{$category->category_name}}</option>
              @endforeach
            </select>
            
          </div>
          
        </div>
        <div class="col-md-6">
          <div class="form-group">
           <input type="text" id="subcategory_name" class="form-control{{ $errors->has('subcategory_name') ? ' is-invalid' : '' }}" name="subcategory_name" required>
           <label class="form-control-placeholder" for="subcategory_name">Sub Category Name<span style="color: red">*</span></label>
           @if ($errors->has('subcategory_name'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('subcategory_name') }}</strong>
          </span>
          @endif
        </div>
        

      </div>

      <div class="col-md-6">
        <div class="form-group">
         <input type="text" id="subcategory_description" class="form-control{{ $errors->has('subcategory_description') ? ' is-invalid' : '' }}" name="subcategory_description" required>
         <label class="form-control-placeholder" for="subcategory_description">Subcategory Description<span style="color: red">*</span></label>
         @if ($errors->has('subcategory_description'))
         <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('subcategory_description') }}</strong>
        </span>
        @endif
      </div>
      

    </div>

    
    
    
  </div>              

  
</div>
<div class="modal-footer">
  <div class="mx-auto">
    <button type="button" class="btn btn-success btn-space" onclick="subdisputebuttonclick()" id="subdisputebutton">Save</button>
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
</div>
<script>
  function subdisputebuttonclick() {
    
  var dispute_subcategory_Code =  $('#dispute_subcategory_Code').val();
     if (dispute_subcategory_Code =='') 
     {
       swal("Enter Dispute Sub-Category Code ", "", "error");
     return false;
     }
     var dispute_categories_id =  $('#dispute_categories_id').val();
     if (dispute_categories_id =='') 
     {
       swal("Select Main Category ", "", "error");
     return false;
     }
      var subcategory_name =  $('#subcategory_name').val();
     if (subcategory_name =='') 
     {
       swal("Enter Sub-Category Name ", "", "error");
     return false;
     }
     var subcategory_description =  $('#subcategory_description').val();
     if (subcategory_description =='') 
     {
       swal("Enter Sub-Category Description ", "", "error");
     return false;
     }
     $("#subdisputebutton").attr("disabled", true);
     document.getElementById('subdispute_form').submit();
   }
     </script>


















