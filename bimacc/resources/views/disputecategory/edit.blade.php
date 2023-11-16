
@foreach ($dispute_categories as $disputeCategory)
<div class="modal fade fade-scale" id="editCategoryModal{{$disputeCategory->id}}" tabindex="-1" role="dialog" aria-labelledby="editCategoryModallabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModallabel">Edit Main Dispute Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body"> 

        <form action="{{ route('disputecategory.update',$disputeCategory->id) }}" method="POST" id="dispute_editform">

                         
            @csrf
            @method('PUT') 
                <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="category_name1" class="form-control" name="category_name"  value="{{$disputeCategory->category_name }}" required="true">
                                <label class="form-control-placeholder" for="category_name" id="category_name">Category Name<span style="color: red">*</span></label>
                                 <!-- @if ($errors->has('category_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_name') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                            
                    </div>


                     <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="dispute_category_Code2" class="form-control{{ $errors->has('dispute_category_Code') ? ' is-invalid' : '' }}" name="dispute_category_Code" required value="{{$disputeCategory->dispute_category_Code }}" required="true">
                                <label class="form-control-placeholder" for="dispute_category_Code">Dispute Category Code<span style="color: red">*</span></label>
                                 @if ($errors->has('dispute_category_Code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dispute_category_Code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                    </div>

                    <div class="col-md-6">
                        
                     <div class="form-group">
                         <input type="text" id="category_description2" class="form-control{{ $errors->has('category_description') ? ' is-invalid' : '' }}" name="category_description" required value="{{$disputeCategory->category_description }}">
                     <label class="form-control-placeholder" for="category_description">Category Description<span style="color: red">*</span></label>
                     @if ($errors->has('category_description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_description') }}</strong>
                                    </span>
                    @endif
                    </div>
                   
                

               

            </div>

            
            
              
        </div>              

                    
    </div>
    <div class="modal-footer">
                <div class="mx-auto">
                        <button type="submit" class="btn btn-success btn-space" >Update</button>                        
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
function disputeeditbuttonclick() {

    
  var category_name =  $('#category_name1').val();
  alert(category_name);
     if (category_name =='') 
     {
       swal("Enter Category Name ", "", "error");
     return false;
     }
     var dispute_category_Code2 =  $('#dispute_category_Code2').val();
     if (dispute_category_Code2 =='') 
     {
       swal("Enter Category Code ", "", "error");
     return false;
     }
      var category_description2 =  $('#category_description2').val();
     if (category_description2 =='') 
     {
       swal("Enter Category Description ", "", "error");
     return false;
     }
      $("#disputeeditbutton").attr("disabled", true);
     document.getElementById('dispute_editform').submit();
   }
     </script> -->










