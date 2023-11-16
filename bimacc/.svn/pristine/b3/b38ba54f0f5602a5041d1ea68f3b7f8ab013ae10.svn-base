
@foreach ($dispute_subcategories as $dispute_subcategorie)

<div class="modal fade centered-modal" id="editSubCategoryModal{{$dispute_subcategorie->id}}" tabindex="-1" role="dialog" aria-labelledby="editSubCategoryModallabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="editSubCategoryModallabel">Edit Sub Dispute Category</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
  </div>
  <div class="modal-body">
     
      
    <form action="{{ route('disputesubcategory.update',$dispute_subcategorie->id) }}" method="POST" id="editsubdispute_form">
        @csrf
        @method('PUT')   
        
        <div class="row register-form">

            <div class="col-md-6">
                <div class="form-group">
                   <input type="text" id="dispute_subcategory_Code1" class="form-control{{ $errors->has('dispute_subcategory_Code') ? ' is-invalid' : '' }}" name="dispute_subcategory_Code"  value="{{$dispute_subcategorie->dispute_subcategory_Code }}" required="true">
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
 
                <select class="form-control" name="dispute_categories_id" id="dispute_categories_id1" required="true">
                    @foreach ($dispute_categories as $category)
                    <option value="{{$category->id}}" {{$category->id == $dispute_subcategorie->dispute_categories_id ? 'selected':''}} >{{$category->category_name}}</option>     
                    @endforeach
                </select>
               <label class="form-control-placeholder">Main Category</label>
            </div>
        </div> 
        <div class="col-md-6">
            
            <div class="form-group">
                <strong>Category Name:</strong>
                <input type="text" name="subcategory_name" id="subcategory_name1" value="{{$dispute_subcategorie->subcategory_name }}" class="form-control" placeholder="Category Name" required="true">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Category Description:</strong>
                <textarea class="form-control" style="height:150px" name="subcategory_description" id= "subcategory_description1" placeholder="Detail" required="true">{{ $dispute_subcategorie->subcategory_description }}</textarea>    
            </div>
        </div> 
    </div>
    
</div>

<div class="modal-footer">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <button type="submit" class="btn btn-primary" >Submit</button>
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

@endforeach
<!-- <script>
  function editsubdisputebuttonclick() {

  var dispute_subcategory_Code =  $('#dispute_subcategory_Code1').val();

     if (dispute_subcategory_Code =='') 
     {
       swal("Enter Dispute Sub-Category Code ", "", "error");
     return false;
     }
     var dispute_categories_id =  $('#dispute_categories_id1').val();
     if (dispute_categories_id =='') 
     {
       swal("Select Main Category ", "", "error");
     return false;
     }
      var subcategory_name =  $('#subcategory_name1').val();
     if (subcategory_name =='') 
     {
       swal("Enter Sub-Category Name ", "", "error");
     return false;
     }subcategory_description
     var subcategory_description =  $('#subcategory_description1').val();
     if (subcategory_description =='') 
     {
       swal("Enter Sub-Category Description ", "", "error");
     return false;
     }
     $("#editsubdisputebutton").attr("disabled", true);
     document.getElementById('editsubdispute_form').submit();
   }
     </script>

 -->